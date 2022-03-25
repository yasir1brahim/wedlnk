<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/libraries/config.html
 */
class CI_Model {

	/**
	 * Class constructor
	 *
	 * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
	 * @return	void
	 */
	public function __construct() {}

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
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
