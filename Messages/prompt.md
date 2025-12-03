عند تعليق الجزء

        try {
            // 5. Prepare image for the API
            $imagePath = Storage::disk('public')->path($path);
            $imageMimeType = File::mimeType($imagePath);
            $imageData = File::get($imagePath);

            // 6. Call Gemini API
            $result = Gemini::geminiProVision()
                ->withPrompt($prompt)
                ->withImage($imageData, $imageMimeType)
                ->generate();

            $feedback = $result->text();

        } catch (\Exception $e) {
            Log::error('Gemini API Error: ' . $e->getMessage());
            
            // 7. Clean up stored image on failure
            Storage::disk('public')->delete($path);

            return back()->with('error', 'Failed to get feedback from the AI. Please try again later.');
        }

        وكتابة 
        جملة ضمن
        $feedback = '';
        نجح الامر ولكن عند ادخالها يفشل ويحدث الصفحة
        ابحث    ضمن
        Log
        انا لدي
        
GEMINI_API_KEY=AIzaSyC5AgjuayavQM4jbob8NA5sWim9yBAfAJI
ضمن .env