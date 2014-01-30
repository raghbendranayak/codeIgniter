<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /*
  * Application   : faveplate
  * Version       : 1.0
  * Created Date  : 08/July/2013
  * Created By    : SIPL Developer
  * Filename      : model_users_webservice.php
  * Purpose       : This class is used for webservice of user module
  */
class Model_users_webservice extends CI_Model {
	
	
    /* Add new user */

	    function signup() {

		$data = array("user_name" => $this->input->get_post('user_name'),

					  "user_email" => $this->input->get_post('user_email'),

					  "user_password" => $this->input->get_post('user_password'),

					  "user_type_id_FK" =>'2'

		); 

    	$this->db->insert(TBL_USER,$data);

    	return $this->db->insert_id(); // return the last inserted id
  	}	

   	/*  This function to check existance of a facebook user */
		
		function valid_register_fb_user($fb_id,$email,$name){
		 $this->db->select('*');
		 $this->db->from(TBL_USER);
		 $this->db->where('fb_id',$fb_id);
		 $this->db->where('is_active', '1');
		 $query = $this->db->get();
		 return $query->result();
		}		
	
	/* This function to check existance of a facebook user */
		function valid_email($email){
		 $this->db->select('*');
		 $this->db->from(TBL_USER);
		 $this->db->where('user_email',$email);
		 $this->db->where('user_type_id_FK', '2');
		 $query = $this->db->get();
		 if($query->num_rows()>0){  //record already avaliable .
					return 1;
				}
				else {
					return 0; //record not avaiable avaliable .
				}
		 }		
	
	/*  This function to register a facebook user */
		
		function register_fb_user($fb_id,$email,$password,$name){
			$data = array(
						'user_name' => $name,
						'user_email' => $email,
						'user_password' =>$password,
						'fb_id' => $fb_id,
						'user_type_id_FK' =>'1'
						);

			$this->db->insert(TBL_USER,$data);
			$id = $this->db->insert_id();
			return $id;
		}
		
	/* Function for checking credentials in database */

	    function check_username_password($user_email,$user_password){

		 $this->db->select('*');

		 $this->db->where('user_email', $user_email);

		 $this->db->where('user_password', $user_password);

         $this->db->where('user_type_id_FK', '2');		 

		 $query = $this->db->get(TBL_USER);

		 //echo $this->db->last_query(); die();

		 if($query->num_rows == 1)

		 {

			 return $query->result();

		 }
		 else{
		   
		   return false;
		
		}
	}
	
	/*Function for updating user's details*/

    	function update_profile($uid) {

		$up_image = $this->input->get_post('profile_image');

		$config['upload_path'] = './uploads/upload_user/';

		$config['allowed_types'] = 'gif|jpg|jpeg|png';

		$config['max_size']	= '100000';

		$config['max_width']  = '1024';

		$config['max_height']  = '768';


		$this->load->library('image_lib');

		$this->image_lib->clear();

		$this->load->library('upload');

		$this->upload->initialize($config);



		if ( ! $this->upload->do_upload('profile_image')) {

			//echo $this->upload->display_errors();

		} else {

			$image_data = $this->upload->data();

			$image_name = $image_data['file_name'];

		}

		$old_image = $this->input->get_post('profile_image_u');
		

		if(isset($image_name) && !empty($image_name)){

		$image_name;	

		}else{

		$image_name = $old_image;

		}		

    	$data = array("user_name" => $this->input->get_post('user_name'),

					  "user_display_name" => $this->input->get_post('user_display_name'),

					  "user_email" => $this->input->get_post('user_email'),

					  "user_profile_url" => $this->input->get_post('user_profile_url'),

					  "user_email2" => $this->input->get_post('user_email2'),

					  "user_image" => $image_name,

					  "user_city" => $this->input->get_post('user_city'),

					  "user_website" => $this->input->get_post('user_website'),

					  "user_description" => $this->input->get_post('user_description'),

					  "new_email_digest" => $this->input->get_post('new_email_digest'),

					  "new_comments" => $this->input->get_post('new_comments'),

					  "someone_compliments" => $this->input->get_post('someone_compliments'),

					  "new_badge" => $this->input->get_post('new_badge'),

					  "someone_starts_following" => $this->input->get_post('someone_starts_following')

		); 
		
		if($uid){

		$this->db->where('user_id', $uid);

		$this->db->update(TBL_USER,$data);
		
		return true;
		}
		
		else{
		
		return false;	
			
		}
  	}	


		
 }

/* End of file model_users_webservice.php */
/* Location: ./application/models/model_users_webservice.php */ 
?>