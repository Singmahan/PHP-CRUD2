    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="js/sweetalert.js"></script>
    <!-- การเพิ่มข้อมูลและอัพเดทข้อมูล -->
    <?php 
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['status']; ?>",
                    // text: "You clicked the button!",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    button: "OK. Done",
                    });
            </script>
            <?php 
            unset($_SESSION['status']);
        }
    ?>
    <!-- การลบข้อมูลแบบ Confirm  -->
    <script>
        $(document).ready(function (){

            $('.delete_btn_ajax').click(function (e){
                e.preventDefault();
                
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                // console.log(deleteid);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: {
                                "delete_btn_set": 1,
                                "delete_id": deleteid,  
                            },
                            
                            success: function(response){
                                swal("Data Deleted Successfully.!",{
                                        icon: "success",
                                    }).then((result) => {
                                        location.reload();
                                });
                            
                            }
                        });
                    }
                });  
            });
        });
    </script>
    

  </body>
</html>