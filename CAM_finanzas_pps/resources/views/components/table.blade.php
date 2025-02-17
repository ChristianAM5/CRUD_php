<div class="overflow-x-auto">
    <table style="background-color: #EFF6FF; border-color: #BFDBFE;" class="min-w-full">
        <thead style="background-color: #DBEAFE;">
            <tr>
                {{ $header }}
            </tr>
        </thead>
        <tbody>
            {{ $body }}
        </tbody>
    </table>
</div>

<style>
    tbody tr:nth-child(odd) {
        background-color: red;
    }
    tbody tr:nth-child(even) {
        background-color: yellow;
    }
</style>
