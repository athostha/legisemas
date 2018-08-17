<div class="pagination">        
    <ul>
        <?php echo $this->Paginator->first('<<', array('tag' => 'li', 'class' => 'first')); ?>
        <?php echo $this->Paginator->prev('<', array('tag' => 'li')); ?>
        <?php echo $this->Paginator->numbers(array('separator' => ' ', 'modulus' => 3, 'first' => 0, 'last' => 0, 'tag' => 'li')); ?>
        <?php echo $this->Paginator->next('>', array('tag' => 'li')); ?>
        <?php echo $this->Paginator->last('>>', array('tag' => 'li')); ?>
    </ul>
</div>

<style>
    .pagination ul > li{
        float: left;
        padding: 4px 12px;
        line-height: 20px;
        text-decoration: none;
        background-color: #ffffff;
        border: 1px solid #dddddd;
        border-left-width: 0px !important;
    }
    .pagination ul > li a{        
        border: 0px solid #dddddd;
        border-left-width: 0px;
        padding: 0px;
    }

    .pagination ul > li.prev{                
        border-left-width: 1px !important;        
    }
    .pagination ul > li.first{                
        border-right-width: 0px !important;       
        border-left-width: 1px !important;        
    }
    .pagination ul > li.first a{
        border-left-width: 0px !important;        
    }   
</style>