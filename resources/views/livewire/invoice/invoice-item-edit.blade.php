<tr>
    <td>
        <a href="javascript:void(0)" wire:click="delete" class="text-decoration-none"><svg xmlns="http://www.w3.org/2000/svg" class="icon text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></a>
    </td>
    <td>
        <input type="text" placeholder="Employee Name" wire:model.debounce.500ms='invoiceItem.employee_name'>
    </td>
    <td>
        <input type="date" wire:model.debounce.500ms='invoiceItem.start_date'>
    </td>
    <td>
        <input type="date" wire:model.debounce.500ms='invoiceItem.end_date'>
    </td>
    <td>
        <input type="text" wire:model.debounce.500ms='invoiceItem.hourly_wage'>
    </td>
    <td>
        <input type="text" wire:model.debounce.500ms='invoiceItem.total_hours'>
    </td>
    <td>
        ${{number_format($invoiceItem->wageAmount)}}
    </td>
    <td>
        <input type="text" wire:model.debounce.500ms='invoiceItem.lodging_expense'>
    </td>
    <td>
        <input type="text" wire:model.debounce.500ms='invoiceItem.milage_expense'>
    </td>
    <td>
        ${{number_format($invoiceItem->totalAmount)}}
    </td>
</tr>
