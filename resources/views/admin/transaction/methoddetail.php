function transactionDetail() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ url("api/admin/transaction/detail") }}',
            dataType: "json",
            success: function(data) {
                // console.log(data);

                jQuery.each(data,function(key,value) {
                   
                // console.log(value[0]);
                var html = "";
                var i = 0;
                    html +='<tr>';
                    html +='<td>'+ value[i][1] + '</td>';
                    html +='<td>'+ value[i][1] + '</td>';
                    html +='<td>'+ value[i][1] + '</td>';
                    html +='</tr>';
                i++;
                });
                $('#transaction_detail').html(html);
            }
        });
    }