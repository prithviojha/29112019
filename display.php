<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
 <body>
    <table class="table">
      <thead class="thead-dark">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>gender</th>
        <th>vechicle</th>
        <th>date</th>
        <th>upload file</th>

        <th rowspan="2">action</th>
      </tr>
    </thead>

      <?php
        $q="SELECT * FROM `user_info`";
         $res=mysqli_query($conn,$q);
         while($row=mysqli_fetch_assoc($res))
         {
          ?>
          <tbody>
         <tr>
            <td><?php echo $row['id']?></td>
             <td><?php echo $row['name']?></td>

            <td><?php echo $row['email']?></td>
            <td><?php echo $row['gender']?></td>
             <td><?php echo $row['vechicle']?></td>
            <td><?php echo $row['date']?></td>             
 

<?php
           if ($row['filename']!=0) 
           {
                  ?>
                     
                 <td>
                  <!-- <?php echo $row['filename'];?> -->

             <a href="http://localhost:81/CRUD_29_09_2019/images/<?php echo $row['filename'];?>">download!</a>

                         <a  href="removefile.php?id=<?php echo $row['id'];?>" id="removefiles">Remove File</a>

                        </td>

           <td> <a  class="btn btn-primary" href="edit.php?id=<?php echo $row['id'];?>">edit</a>
            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">delete</a></td>            

            <?php
            }
            else
            {

            ?>
             <td><?php  echo "file not found";?></td>
             
           
           
          
          
            <td><a  class="btn btn-primary" href="edit.php?id=<?php echo $row['id'];?>">edit</a>
            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">delete</a></td>
            <?php
            }
            ?>
        </tr>

        <?php
         if(mysqli_num_rows($res)<0)
         {
              echo "no data to display";
         } 
       }
         ?>        
       
      </table>
  </body>
  </html>

