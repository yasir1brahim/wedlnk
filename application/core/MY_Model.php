<?php
class MY_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function save($data,$table,$id=NULL){
		if(!$id){
			$data['created_at'] = date('Y-m-d H:i:s');
			$this->db->insert($table,$data);
		} else {
			$data['modified_at'] = date('Y-m-d H:i:s');
			$this->db->set($data)
			->where('id',$id)
			->update($table);
		}

		return ['affect'=>$this->db->affected_rows(),'id'=>$this->db->insert_id()];
	}
    // General / Universal function for selecting data from database
	public function getSpecificColsv2($params){

        $defaultParams = [
            'columns'=>'*',
            'condition'=>[],
            'row'=>FALSE,
            'like'=>[],
            'order'=>[],
            'limit'=>[],
            'result_array'=>FALSE
        ];

        $allParams = array_merge($defaultParams,$params);

        extract($allParams);

        $this->db->select($columns,FALSE);
        $this->db->where($condition);

        if(!empty($like)){
            $i_like = 0;
            foreach($like as $contains){
                $i_like++;
                extract($contains);
                if($i_like===1){

                $this->db->like($column,$value,isset($type) ? $type : NULL);

                } else {
                $this->db->or_like($column,$value,isset($type) ? $type : NULL);
                }
            }
        }

        if(!empty($order)){
            extract($order);
            $this->db->order_by($column,$sort_type);
        }

        if(!empty($limit)){
           extract($limit);
           $this->db->limit($records,isset($index) && $index ? $index : 0);
        }

        if(!empty($group_by)){
           $this->db->group_by($group);
        }

        $result = $this->db->get($table);

        return !$row ?
        (!$result_array ? $result->result() : $result->result_array()) :
        (!$result_array ? $result->row() : $result->row_array());
    }
}
