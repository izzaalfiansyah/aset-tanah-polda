<form action="" method="GET" class="filter-user">
    <select name="user_id" class="form-select" data-control="select2" data-placeholder="Semua User"
        onchange="{
        const form = document.querySelector('form.filter-user');
        // const searchParams = new URLSearchParams(window.location.search);
        // searchParams.set('user_id', this.value != '0' ? this.value : '');
        // window.location.href = window.location.origin + window.location.pathname + '?' + searchParams.toString();
        this.value = this.value != '0' ? this.value : '';
        form.submit();
    }">
        <option value="0">Semua User</option>
        @foreach (\App\Models\User::all() as $item)
            <option value="{{ $item->id }}" {{ request()->get('user_id') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
</form>
