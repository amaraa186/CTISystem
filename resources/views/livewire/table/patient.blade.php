<div>
    <x-data-table :data="$data" :model="$patients">
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
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                    説明
                    @include('components.sort-icon', ['field' => 'description'])
                </a></th>
                <th><a wire:click.prevent="sortBy('age')" role="button" href="#">
                    年齢
                    @include('components.sort-icon', ['field' => 'age'])
                </a></th>
                <th><a wire:click.prevent="sortBy('phone number')" role="button" href="#">
                    電話番号
                    @include('components.sort-icon', ['field' => 'phone number'])
                </a></th>
                <th><a wire:click.prevent="sortBy('address')" role="button" href="#">
                    住所
                    @include('components.sort-icon', ['field' => 'address'])
                </a></th>
                <th>アクション</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($patients as $patient)
                @if($patient->deleted == 0)
                <tr x-data="window.__controller.dataTableController({{ $patient->id }})">
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->kana }}</td>
                    <td>{{ $patient->description }}</td>
                    <td>{{ $patient->age }}</td>
                    <td>{{ $patient->phone_number }}</td>
                    <td>{{ $patient->address }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/patient/edit/{{ $patient->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                @endif
            @endforeach
        </x-slot>
    </x-data-table>
</div>
