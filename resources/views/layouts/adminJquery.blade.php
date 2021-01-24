<script>
    $(document).ready(function () {
        $('#category').on('change', function () {
            var category_id = this.value;
            $.ajax({
                url: "{{route('getSub')}}",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function (dataResult) {
                    var subcat = "";
                    @foreach($subcat as $subcategory)
                        subcat = "<option value='{{$subcategory->id}}'>{{$subcategory->name}}</option>"
                    $("#sub_category").html(subcat);
                @@endforeach

                }
            });


        });
    });
</script>
