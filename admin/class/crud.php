
<?php

    class crud{

        protected $host='localhost';
        protected $username='root';
        protected $password='';
        protected $database='library_management';
        protected $connect;


        function __construct(){
            $this->connect=new mysqli($this->host,$this->username,$this->password,$this->database);
        }

        public function common_select($table,$fields='*',$where=false,$sort='id',$sort_type='desc',$offset=false,$limit=false){
            $data=[];
            $error=0;
            $error_msg="";

            $sql="select $fields from $table";
            $sql.=" where status=1 ";
            if($where){
                $sql.=" and ";
                $i=0;
                foreach($where as $k=>$v){
                    $sql.="$k='$v'";
                    if($i<count($where)-1){
                        $sql.=" and ";
                    }
                    $i++;
                }
            }

            $sql.=" order by $sort $sort_type";

            if($limit){
                $sql.=" limit $offset $limit";
            }

            $result=$this->connect->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($r=$result->fetch_object()){
                        array_push($data,$r);
                    }
                }else{
                    $error=1;
                    $error_msg="No data available";
                }
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);

        }
        public function common_select_with_trash($table,$fields='*',$where=false,$sort='id',$sort_type='desc',$offset=false,$limit=false){
            $data=[];
            $error=0;
            $error_msg="";

            $sql="select $fields from $table";
           
            if($where){
                $sql.=" where ";
                $i=0;
                foreach($where as $k=>$v){
                    $sql.="$k='$v'";
                    if($i<count($where)-1){
                        $sql.=" and ";
                    }
                    $i++;
                }
            }

            $sql.=" order by $sort $sort_type";

            if($limit){
                $sql.=" limit $offset $limit";
            }

            $result=$this->connect->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($r=$result->fetch_object()){
                        array_push($data,$r);
                    }
                }else{
                    $error=1;
                    $error_msg="No data available";
                }
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);

        }
        // Retrive End

        // Retrive Start
        public function common_insert($table,$fields){
            $data='';
            $error=0;
            $error_msg="";

            $sql="insert into $table set ";

            foreach($fields as $name=>$value){
                $sql.="$name='$value', ";
            }
            $sql=rtrim($sql,', ');
            $result=$this->connect->query($sql);
            if($result){
                $data=$this->connect->insert_id;
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);
        }

        // Update start
        public function common_update($table,$fields,$where){
            $data='';
            $error=0;
            $error_msg="";

            $sql="update $table set ";

            foreach($fields as $name=>$value){
                $sql.="$name='$value', ";
            }
            $sql=rtrim($sql,', ');

            if($where){
                $sql.=" where ";
                $i=0;
                foreach($where as $k=>$v){
                    $sql.="$k='$v'";
                    if($i<count($where)-1){
                        $sql.=" and ";
                    }
                    $i++;
                }
            }

            $result=$this->connect->query($sql);
            if($result){
                $data=$this->connect->affected_rows;
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);
        }
        // Update End

        // Delete Start
        public function common_delete($table,$where){
            $data='';
            $error=0;
            $error_msg="";
            $sql="delete from $table";
            if($where){
                $sql.=" where ";
                $i=0;
                foreach($where as $k=>$v){
                    $sql.="$k='$v'";
                    if($i<count($where)-1){
                        $sql.=" and ";
                    }
                $i++;
                }
            }
            $result=$this->connect->query($sql);
            if($result){
                $data=$this->connect->affected_rows;
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);
        }
        // Delete End
        public function soft_delete($table,$fields=false,$where=false){
            $data='';
            $error=0;
            $error_msg="";

            $sql="update $table set status=0, ";
            if($fields){
                foreach($fields as $name=>$value){
                    $sql.="$name='$value', ";
                }
                $sql=rtrim($sql,', ');
            }
            
            if($where){
                $sql.=" where ";
                $i=0;
                foreach($where as $k=>$v){
                    $sql.="$k='$v'";
                    if($i<count($where)-1){
                        $sql.=" and ";
                    }
                    $i++;
                }
            }

            $result=$this->connect->query($sql);
            if($result){
                $data=$this->connect->affected_rows;
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);
        }
        
        public function common_query($sql){
            $data=[];
            $error=0;
            $error_msg="";

            $result=$this->connect->query($sql);
            if($result){
                if($result->num_rows > 0){
                    while($r=$result->fetch_object()){
                        array_push($data,$r);
                    }
                }else{
                    $error=1;
                    $error_msg="No data available";
                }
            }else{
                $error=1;
                $error_msg=$this->connect->error;
            }
            
            return array('data'=>$data,'error'=>$error,'error_msg'=>$error_msg);

        }
    }