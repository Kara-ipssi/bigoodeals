<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products list') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <table class="datatable">
            <tr>
                <th>Firstname</th>
                <th>LastName</th>
            </tr>
            <tr>
                <td>Salut</td>
                <td>Salut</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready( function () {
                $('.datatable').DataTable();
            } );
        </script>
    </x-slot>
</x-app-layout>
