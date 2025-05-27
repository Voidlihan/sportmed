@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif

<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <label>Имя:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Сообщение:</label><br>
    <textarea name="message" rows="5" required></textarea><br><br>

    <button type="submit">Отправить</button>
</form>
