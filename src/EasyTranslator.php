<?php namespace AmitKhare;

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */
/**
 * Validbit is an easy to use PHP validation library.
 *
 *
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link https://github.com/amitkhare/easy-validation
 * @author Amit Kumar Khare <me.amitkhare@gmail.com>
 */

class EasyTranslator {
    private static $localePath = __DIR__."/locales/";
    private static $isFormatReplacement = true;
    private static $locale = "en-IN";
    private static $intermediateLocalePath = null;
    
    public static function setLocale($locale){
        
        if(count($locale = explode("-",$locale)) == 2){
    		$locale = strtolower($locale[0])."-".strtoupper($locale[1]);
    	} else {
    		$locale = "en-IN";
    	}
    	
        self::$locale = $locale;
    }
    
    public static function setLocalePath($localePath){
        
        if(file_exists($localePath)) {
    
        	self::$localePath = realpath($localePath).DIRECTORY_SEPARATOR;
        	
        }
        
    }
    public static function setIntermediateLocalePath($localePath){
        if(file_exists($localePath)) {
    
        	self::$intermediateLocalePath = realpath($localePath).DIRECTORY_SEPARATOR;
        	
        }
    }
    
    // same as translator
    public static function t($keyString,$replacements=null,$locale=null){
        self::translate($keyString,$replacements,$locale);
    }
    
    public static function translate($keyString,$replacements=null,$locale=null){
        
        if($locale){
            self::setLocale($locale);
        }
        
        $string = self::getString($keyString);
        
        if($replacements==null){
            return $string;
        }
        
        if(is_array($replacements)){
            foreach ($replacements as $key=>$replacement) {
                $replacements[$key] = self::formatReplacement($replacement);
            }
        } else {
            $replacements = [self::formatReplacement($replacements)];
        }
        
        return vsprintf($string, $replacements);
        
    }
    
    private static function getString($keyString){
        
        $keyString = strtoupper($keyString);
        
        if($val = self::findString(self::$localePath, self::$locale, $keyString) ){
           return $val; 
        }
        
        if($val = self::findString(self::$intermediateLocalePath, self::$locale, $keyString) ){
           return $val; 
        }
        
        if($val = self::findString(__DIR__."/locales/", self::$locale, $keyString) ){
           return $val; 
        }
        
        // noting found return formatted keystring
        return self::formatString($keyString);

    }
    
   private static function findString($localePath, $locale, $keyString){
       $keyString = strtoupper($keyString);
       
       if($val =  self::fetchVal($localePath.$locale.".lang",$keyString) ){
           return $val;
       }
       
       if($val =  self::fetchVal($localePath."en-IN.lang",$keyString) ){
           return $val;
       }
    
   }
    
    private static function fetchVal($file,$keyString){
        if(file_exists($file)){
           
           $file = file_get_contents($file);
           $file = json_decode($file,true);
           
           if(array_key_exists($keyString,$file)){
                return $file[$keyString];
            }
        }
    }
    
    private static function formatString($string){
        $string = str_replace("_"," ",$string);
        $string = str_replace("-"," ",$string);
        $string = strtolower($string);
        $string = ucwords($string);
        return $string;
    }
    public static function setFormatReplacement($format=true){
        self::$isFormatReplacement = $format;
    }
    private static function formatReplacement($replacement) {
        if(self::$isFormatReplacement){
            return self::getString($replacement);
        }
        
        else return $replacement;
    }
     
}
