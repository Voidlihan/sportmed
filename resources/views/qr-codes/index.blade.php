<a href="/admin">
    <button style="background:rgb(76, 114, 175); color: white; padding: 10px 20px; border-radius: 5px;">Назад в админ-панель</button>
</a>
<br><br><br>
<h2 style="text-align: center;">Добавление QR кода</h2>
<form action="{{ route('admin.qr-codes.store') }}" method="POST" enctype="multipart/form-data" style="justify-content: center; align-items: center; text-align: center;">
    @csrf
    <label for="title">Название (например, kaspi):</label>
    <input type="text" name="title" required>

    <label for="image">QR Изображение:</label>
    <input type="file" name="image" accept="image/*" required>

    <button type="submit">Загрузить</button>
</form>

@foreach ($qrCodes as $qr)
    <div style="display: flex;">
        <div>
            <h3>{{ ucfirst($qr->title) }}</h3>
            <img src="{{ asset('storage/' . $qr->image_path) }}" alt="{{ $qr->title }}" width="200">
            <form action="{{ route('admin.qr-codes.destroy', $qr->id) }}" method="POST" onsubmit="return confirm('Удалить этот QR-код?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="color:red;">Удалить</button>
            </form>
        </div>
    </div>
@endforeach
