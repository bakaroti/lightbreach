<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databases extends Model
{
    protected $fillable = ['description', 'file_path', 'user_id'];

    public function create()
    {
        return view('databases.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:rar,zip|max:10240', // Adjust max file size as needed
        ]);

        $data = [
            'description' => $request->input('description'),
            'file_path' => $request->file('file')->store('uploads', 'public'),
        ];

        Databases::create($data);

        return redirect('/databases')->with('success', 'Data berhasil diunggah.');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
