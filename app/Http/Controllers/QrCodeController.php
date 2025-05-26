<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QrCode;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    public function index()
    {
        $qrCodes = QrCode::all();

        return view('qr-codes.index', compact('qrCodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
        ]);
    
        // Сохраняем файл в папку public/storage/qr
        $path = $request->file('image')->store('qr', 'public');
    
        // Сохраняем в БД именно то, что ввёл админ
        QrCode::create([
            'title' => $request->input('title'),     // ← сохраняем "Kaspi"
            'image_path' => $path,                   // ← путь типа "qr/qrkaspi.png"
        ]);
    
        return redirect()->back()->with('success', 'QR-код загружен!');
    }
    public function destroy($id)
    {
        $qr = QrCode::findOrFail($id);

        // Удаление файла из хранилища
        if ($qr->image_path && Storage::disk('public')->exists($qr->image_path)) {
            Storage::disk('public')->delete($qr->image_path);
        }

        $qr->delete();

        return redirect()->back()->with('success', 'QR-код удалён');
    }
}
