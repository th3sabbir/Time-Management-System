<!-- jQuery --><script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap 5 --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables --><script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<!-- Flatpickr --><script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    window._token = '{{ csrf_token() }}';
    $(function(){
        // Init datatables
        if($('.datatable').length){
            $('.datatable').DataTable({
                responsive:true,
                language:{search:'',searchPlaceholder:'Search\u2026'},
                dom:'<"d-flex justify-content-between align-items-center mb-3"lf>rtip'
            });
        }
        // Mass delete
        $('#select-all').on('change',function(){
            $('input[name="ids[]"]').prop('checked',$(this).prop('checked'));
        });
        $('#btn-mass-delete').on('click',function(){
            var ids=$('input[name="ids[]"]').filter(':checked').map(function(){return $(this).val();}).get();
            if(!ids.length){alert('Select at least one row.');return;}
            if(!confirm('Delete selected records?'))return;
            $.post(window.route_mass_crud_entries_destroy,{ids:ids,_token:window._token},function(){location.reload();});
        });
        // Sidebar mobile toggle
        $('#sidebarToggle').on('click',function(){$('.sidebar').toggleClass('open');$('.overlay').toggleClass('show');});
        $('.overlay').on('click',function(){$('.sidebar').removeClass('open');$(this).removeClass('show');});
    });
</script>
@yield('javascript')