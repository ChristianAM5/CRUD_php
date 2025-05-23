<x-layouts.main :title="$title">
    <p>El body de incomes:</p>
    <x-table>
        <x-slot name="header">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
        </x-slot>
        <x-slot name="body">
            @foreach ($incomes as $income)
		<tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $income[0] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $income[1] }}</td>
                </tr>
            @endforeach
        </x-slot>
    </x-table>
</x-layouts.main>
