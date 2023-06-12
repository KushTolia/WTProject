<?php
    session_start();
    include "../../connection.php";
    $sc=$_REQUEST["subjectCode"];
    $uid=$_SESSION["uid"];
    $unitNo=$_REQUEST["unit_no"];
    $unitName=$_REQUEST["unit_name"];
    $author=$_REQUEST["author_name"];
    if(isset($_FILES["content"]))
    {
        $pdf_nm=$_FILES['content']['name'];
        $pdf_size=$_FILES['content']['size'];
        $pdf_path=$_FILES['content']['tmp_name'];
        $error=$_FILES['content']['error'];
        if($error==0)
        {
            $max_size=10*1024*1024;
            if($pdf_size>$max_size)
            {
                $er='Sorry Your File Is Too Large';
                header("Location: ../index.php?error=$er");            
            }
            else
            {
                $pdf_ex=pathinfo($pdf_nm,PATHINFO_EXTENSION);
                $pdf_ex_lc=strtolower($pdf_ex);

                $allowed_exs=array("pdf","ppt","pptx","doc","docx");
                if(in_array($pdf_ex_lc,$allowed_exs))
                {
                    // $new_pdf_nm=uniqid("PDF-",true).'.'.$pdf_ex_lc;
                    $new_pdf_nm=strtoupper($pdf_ex_lc)." ".$pdf_nm;
                    $pdf_upload_path='../files/'.$new_pdf_nm;
                    move_uploaded_file($pdf_path,$pdf_upload_path);
                    $ins=mysqli_query($con,"insert into study_material(subjectCode,userID,unitNo,unitName,author,path) values('".$sc."','".$uid."','".$unitNo."','".$unitName."','".$author."','".$new_pdf_nm."')");
                    if($ins)
                    {
                        // echo $pdf_path;
                        echo "<h1 style='color:green'>"."Data Inserted  <a  style='color:blue' href='../../HomePage/sidebar-01/index.php'>Click Here To Go To Home Page</a>"."</h1>";
                        // header("Location: ");
                    }
                    else
                    {
                        echo mysqli_error($con);
                    }
                }
                else
                {
                    $er='You Can not Upload Files Of This Types';
                    header("Location: ../index.php?error=$er");     
                }
            }
        }
        else
        {
            $er='Sorry Some Error Occured';
            header("Location: ../index.php?error=$er");  
        }
    }
    // $ins=mysqli_query($con,"insert into study_material values");
?>