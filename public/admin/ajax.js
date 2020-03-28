

$('document').ready(function(){

    $('.edit').click(function(){


        var $id = $(this).data('id');

        $.ajax({
            method: "GET",
            url: 'category/' + $id + '/edit',
            success:function($result){
                $('.name').val($result.name);
                $('.description').val($result.description);
                if($result.status === 1){
                    $('#status-1').attr('checked',true);
                }else{
                    $('#status-0').attr('checked',true);

                }

            }

        });

        $('.update').on('click',function(){

            let $name = $('.name').val();
            var $status = $('input[name=status]:checked').val();
            let $description = $('.description').val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "PATCH",
                url: 'category/' + $id,
                data:{
                    'id':$id,
                    'name':$name,
                    'description':$description,
                    'status':$status
                },
                success:function($result){
                    $id = null;
                    if($result.errors){
                        toastr.error('Error',$result.errors.name,{timeout:6000})
                        $('.name').addClass('is-invalid ');
                    }else{
                        toastr.success('Success',"Updated successfully",{timeout:5000})
                        setTimeout(function(){
                            // location.reload();
                        },2500);

                    }


                }

            });

        });

    });


    // delete
    $('.delete').on('click',function(){
        let $id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "DELETE",
                url: 'category/' + $id,
                success:function($result){
                   if($result.state==='success'){

                        toastr.success('Success',"Delete successfully",{timeout:5000})
                        setTimeout(function(){
                            location.reload();
                        },2500);
                   }

                }
            })
    });

});

