namespace Admin\Model;


use Think\Model;
use Think\Page;

class <?php echo $filename?>Model extends BaseModel
{

    protected $_validate = array(

        <?php foreach($res as $re){
        if($re['null']=='YES'){
            continue;
        }
        echo "array('{$re['field']}','require','{$re['comment']}不能为空'), \r\n";
        }
        ?>
    );

}