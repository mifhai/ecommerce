<script>
    $(document).ready(function(){
        $('select[name="province_origin"]').on('change', function(){
            let provinceId = $(this).val();
            if(provinceId){
                $.ajax({
                    url : '/province/'+provinceId+'/cities/',
                    type : "GET",
                    dataType : "json",
                    success:function(data){
                        // $('select[name="city_origin"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="city_origin"]').append('<option value="'+ key +'">' + value + '</option>');
                        });

                        $('select[name="city_origin"]').on('change', function(){
                            let districtId = $(this).val();
                            if(districtId){
                                $.ajax({
                                    url : '/cities/'+districtId+'/district/',
                                    type : "GET",
                                    dataType : "json",
                                    success:function(data){
                                        // $('select[name="district_origin"]').empty();
                                        $.each(data, function(key, value){
                                            $('select[name="district_origin"]').append('<option value="'+ key +'">' + value + '</option>');
                                        });
                                    },
                                });
                            }else{
                                $('select[name="district_origin"]').empty();
                            }
                        });
                    },
                });
            }else{
                $('select[name="city_origin"]').empty();
            }

        });
    });
</script>
