<a href="/admin">
    <button style="background:rgb(76, 114, 175); color: white; padding: 10px 20px; border-radius: 5px;">Назад в админ-панель</button>
</a>
<br><br><br>
@if(session('success'))
    <div style="color: green; font-weight: bold; text-align: center;">
        {{ session('success') }}
    </div>
@endif
<h2 style="text-align: center;">Сообщения с формы обратной связи</h2>

@if ($messages->isEmpty())
    <p style="text-align: center;">Сообщений пока нет.</p>
@else
    @foreach ($messages as $message)
        <div style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin: 20px 0;">
            <p><strong>Имя:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Сообщение:</strong><br> {{ nl2br(e($message->message)) }}</p>
            <p style="font-size: 0.9em; color: gray;"><strong>Дата:</strong> {{ $message->created_at->format('d.m.Y H:i') }}</p>
        </div>
        <form action="{{ route('admin.contact-messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Удалить это сообщение?');" style="margin-top: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: red; color: white; border: none; padding: 8px 12px; border-radius: 5px;">Удалить</button>
        </form>
    @endforeach
    <div style="text-align: center;">
        {{ $messages->links() }}
    </div>
@endif
