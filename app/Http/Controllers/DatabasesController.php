<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Databases;
use App\Http\Requests\StoreDatabasesRequest;
use App\Http\Requests\UpdateDatabasesRequest;
use Illuminate\Support\Facades\Validator;



class DatabasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all records from the 'databases' table
        $databases = Databases::all();

        // Count the number of rows in the 'databases' table
        $databasesCount = Databases::count();

        return view('databases.index', compact('databases', 'databasesCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('databases.upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'description' => 'required',
        'file' => 'required|file|mimes:rar,zip|max:10240',
    ]);

    // Check for validation failure
    if ($validator->fails()) {
        return redirect('/upload')
            ->withErrors($validator)
            ->withInput();
    }

    // Handle file upload
    $filePath = null;
if ($request->hasFile('file')) {
    $file = $request->file('file');

    // Log the MIME type
    \Log::info('MIME Type: ' . $file->getMimeType());

    $fileName = $file->getClientOriginalName();
    $file->storeAs('uploads', $fileName, 'public');
    $filePath = 'uploads/' . $fileName;
}

    // Create an instance of the Databases model
    $database = new Databases([
        'description' => $request->input('description'),
        'file_path' => '/storage/'. $filePath,
        'user_id' => auth()->id(),
    ]);

    // Save data to the database
    $database->save();

    return redirect('/databases')->with('success', 'Data berhasil diunggah.');
}

    /**
     * Display the specified resource.
     */
    public function show(Databases $databases)
    {
        // You can implement logic to show a specific database entry
        // return view('databases.show', ['database' => $databases]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Databases $databases)
{
    // return view('databases.edit', ['database' => $databases]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDatabasesRequest $request, Databases $databases)
    {
        // You can implement logic to update the database entry
        $databases->update($request->all());

        return redirect('/databases')->with('success', 'Data berhasil diperbarui.');
    }

    public function myPosts()
{
    // Retrieve the posts related to the current user
    $userPosts = Databases::where('user_id', auth()->id())->latest()->get();

    return view('mypost', ['databases' => $userPosts]);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Databases $databases)
    {
        // You can implement logic to delete the database entry and its associated file
        Storage::delete($databases->file_path);
        $databases->delete();

        return redirect('/databases')->with('success', 'Data berhasil dihapus.');
    }
}
