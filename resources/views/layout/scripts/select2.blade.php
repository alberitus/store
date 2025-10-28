<script>
    $(document).ready(function() {
        $('.select2').each(function() {
            const $this = $(this);
            const parentModal = $this.closest('.modal');
            const isMultiple = $this.hasClass('multiple');

            $this.select2({
                dropdownParent: parentModal.length ? parentModal : $('body'),
                placeholder: $(this).data('placeholder') || 'Select an option',
                width: '100%',
                theme: 'bootstrap4',
                allowClear: true,
                dropdownAutoWidth: true,
                dropdownCssClass: isMultiple ? 'multi-column' : ''
            });
        });

        $('.modal').on('shown.bs.modal', function() {
            $(this).find('.select2').select2({
                dropdownParent: $(this),
                width: '100%',
                theme: 'bootstrap4'
            });
        });

        $(document).on('select2:open', function() {
            let searchField = document.querySelector('.select2-container--open .select2-search__field');
            if (searchField) {
                searchField.focus();
            }
        });
    });
</script>