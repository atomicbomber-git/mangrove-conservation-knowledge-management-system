<script>
    $(".table").DataTable({
        "order": [],
        "lengthMenu": [15, 30, 45],
        "pageLength": 15,
        "language": { "url": "{{ asset("datatables-indonesian.json") }}" }
    })
</script>