<div>
    <x-data-table :data="$data" :model="$floors">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    フロア
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    説明
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                <th>アクション</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($floors as $floor)
                @if($floor->deleted == 0)
                <tr x-data="window.__controller.dataTableController({{ $floor->id }})">
                    <td>{{ $floor->id }}</td>
                    <td>{{ $floor->name }}</td>
                    <td>{{ $floor->description }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/floor/edit/{{ $floor->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>
</div>
