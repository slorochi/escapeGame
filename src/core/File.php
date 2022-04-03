<?php
namespace App\core;


    class File {

        public string $file;
        public $ressource;
        public $nbLigne = 0;
        protected $mode ="";
        protected $eof = false;
        protected $writeMode = ["r+","w","w+","a","a+","x","x+","c","c+"];

        public function __construct(string $file, string $mode){
            $this->file = $file;
            $this->mode = $mode;
            $this->ressource = $this->open($this->mode);
        }

        private function open(string $mode){
            return fopen($this->file, $mode); 
        }

        public function close(){
            return fclose($this->ressource); 
        }
        
        public function delete(){
            return unlink($this->file);
        }

        public function readOctet($nbOctet){
            return fread($this->ressource,$nbOctet);
        }

        public function readLigne(){
            return fgets($this->ressource);
        }

        public function readCharacter(){
            return fgetc($this->ressource);
        }

        public function write($message){
            if($this->ressource && in_array($this->mode, $this->writeMode)){
                /* $this->goEof(); */
                return fwrite($this->ressource, $message.PHP_EOL);
            }

        }

        public function goEof() : bool{
            if(!$this->eof){
                return (fseek($this->ressource, 0 ,SEEK_END) === 0) ? $this->eof = true : false; 
            }else{
                return $this->eof;
            }
        }

        public function isEof() : bool{
            return feof($this->ressource);
        }

        public function rewind(){
            return rewind($this->ressource);
        }

        public function whereIsPointer() : int{
            return ftell($this->ressource);
        }

        public function getSize(){
            return filesize($this->file);
        }

        public function countLines() : int{
            while(!($this->isEof())){
                $this->readLigne();
                $this->nbLigne++;
            }
            return $this->nbLigne;
        }

        public function getLine(int $numeroLigne) : string{
            if(is_int($numeroLigne)){
                
                if($numeroLigne > $this->countLines()){
                    return "Nombre plus grand que le nombre de ligne du fichier \n";
                }
                else if($numeroLigne < 0){
                    return "Nombre trop petit \n";
                }
                $this->rewind();
                for($i = 0; $i < $numeroLigne - 1; $i++){
                    $this->readLigne();
                }
                return $this->readLigne();
            }
            return "Valeur incorrecte, la fonction attend un nombre entier \n";
            
            
        }
        /**
         * - true pour tableau object
         * - false pour tableau de string
         */

        public function getAllLine(bool $toStandartObject = false) : array{
            $lines = [];
            if($this->ressource){
                $this->rewind();
                if($toStandartObject){
                    while(!feof($this->ressource)){
                        $lines[] = json_decode(fgets($this->ressource));
                    }
                }else{
                    while(!feof($this->ressource)){
                        $lines[] = fgets($this->ressource);
                    }
                }
                array_splice($lines, count($lines) - 1, 1);

                return $lines;
            }
            return false;
        }

        public static function getDataToArray(string $filename){
            $array =  file($filename);
            return $array;
        }

        public static function isExist(string $filename){
            return file_exists($filename);
        }

        public static function getPath(string $filename){
        return realpath($filename);
    }

    }
?>