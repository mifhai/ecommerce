<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script>
    function submitForm() {
        // Kirim request ajax
        $.post("{{ route('midtrans.store') }}",
        {
            _method: 'POST',
            _token: '{{ csrf_token() }}',
            email: $('input#email').val(),
            name: $('input#name').val(),
            alamat_lengkap: $('input#alamat_lengkap').val(),
            provinsi: $('input#provinsi').val(),
            kota: $('input#kota').val(),
            kecamatan: $('input#kecamatan').val(),
            kode_pos: $('input#kode_pos').val(),
            phone: $('input#phone').val(),
            ongkir: $('input#ongkir').val(),
            kode_coupon: $('input#kode_coupon').val(),
            nilai_coupon: $('input#nilai_coupon').val(),
            order_status: $('input#order_status').val(),
            bank_name: $('input#bank_name').val(),
            kode_pembayaran: $('input#kode_pembayaran').val(),
            total_pembayaran: $('input#total_pembayaran').val(),
            session_id: $('input#session_id').val(),
            courier: $('input#courier').val(),
            service: $('input#service').val(),
        },
        function (data, status) {
            snap.pay(data.snap_token, {
                // Optional
                onSuccess: function (result) {
                    location.reload();
                },
                // Optional
                onPending: function (result) {
                    location.reload();
                },
                // Optional
                onError: function (result) {
                    location.reload();
                }
            });
        });
        return false;
    }
</script>
