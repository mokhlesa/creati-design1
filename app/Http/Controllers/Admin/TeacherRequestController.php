<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Notifications\TeacherRequestApproved;
use App\Notifications\TeacherRequestRejected;
use App\Http\Controllers\Controller;
use App\Models\TeacherRequest;
use Illuminate\Http\Request;

class TeacherRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all teacher requests that are pending approval
        $teacherRequests = TeacherRequest::where('status', 'pending')->with('user')->get();

        return view('admin.teacher-requests.index', compact('teacherRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is not typically used for listing requests, but is required by Resource
        // If needed, it could be used to approve/reject a specific request.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Not used for this resource in this context
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherRequest $teacherRequest)
    {
        // Display details of a specific teacher request, including user info
        return view('admin.teacher-requests.show', compact('teacherRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherRequest $teacherRequest)
    {
        // Show form to approve/reject and potentially add a message
        return view('admin.teacher-requests.edit', compact('teacherRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherRequest $teacherRequest)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'message' => 'nullable|string',
        ]);

        $originalStatus = $teacherRequest->status;
        $newStatus = $request->status;
        $userId = $teacherRequest->user_id;
        $user = $teacherRequest->user;

        // Update the teacher request status
        $teacherRequest->update($request->only('status', 'message'));

        // Handle role update and notifications
        if ($newStatus === 'approved' && $originalStatus !== 'approved') {
            // Assign teacher role
            $teacherRole = Role::where('name', 'instructor')->first();
            if ($teacherRole) {
                $user->role_id = $teacherRole->id;
                $user->save();
            }
            // Send approval notification
            $user->notify(new TeacherRequestApproved($teacherRequest));
            session()->flash('success', 'تمت الموافقة على طلب المعلم وتعيين دور المعلم للمستخدم.');
        } elseif ($newStatus === 'rejected' && $originalStatus !== 'rejected') {
            // Optionally revoke teacher role if they had it and are now rejected
            // This part might need adjustment if a user should be reverted to a default role
            // Send rejection notification
            $user->notify(new TeacherRequestRejected($teacherRequest));
            session()->flash('success', 'تم رفض طلب المعلم.');
        }

        return redirect()->route('admin.teacher-requests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherRequest $teacherRequest)
    {
        $teacherRequest->delete();
        return redirect()->route('admin.teacher-requests.index')->with('success', 'Teacher request deleted successfully.');
    }
}
