<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    名前
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('kana')" role="button" href="#">
                    名前(カタカナ)
                    @include('components.sort-icon', ['field' => 'kana'])
                </a></th>
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                    メール
                    @include('components.sort-icon', ['field' => 'email'])
                </a></th>
                <th>アクション</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                @if($user->deleted == 0 && $user->role_id == 2)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->kana }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/user/edit/{{ $user->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>
</div>
