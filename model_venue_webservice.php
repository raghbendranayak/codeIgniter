<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /*
  * Application   : faveplate
  * Version       : 1.0
  * Created Date  : 09/July/2013
  * Created By    : SIPL Developer
  * Filename      : model_venue_webservice.php
  * Purpose       : This class is used for webservices of venue dish list
  */
class Model_venue_webservice extends CI_Model {
	
       
   	/* function for overview tab dishes at home page */

	public function get_location_map(){

        $this->db->select(''.TBL_FOOD_ITEM.'.food_id,'.TBL_FOOD_ITEM.'.food_name,'.TBL_FOOD_ITEM.'.food_image,'.TBL_FOOD_ITEM.'.food_description,'.TBL_FOOD_ITEM.'.created_date,'.TBL_FOOD_ITEM.'.user_id_FK,'.TBL_FOOD_ITEM.'.venue_id_FK,'.TBL_VENUE.'.venue_id,'.TBL_VENUE.'.venue_name,'.TBL_VENUE.'.venue_twitter_url,'.TBL_VENUE.'.venue_street_address,'.TBL_VENUE.'.venue_contact_number,'.TBL_VENUE.'.venue_postal_code,'.TBL_VENUE.'.venue_latitude,'.TBL_VENUE.'.venue_longitude,'.TBL_VENUE.'.country_id_FK,'.TBL_VENUE.'.state_id_FK,'.TBL_VENUE.'.city_id_FK,'.TBL_VENUE.'.venue_type_id_FK,'.TBL_CITY.'.city_id,'.TBL_CITY.'.city_name,'.TBL_CITY.'.latitude,'.TBL_CITY.'.longitude,'.TBL_CITY.'.state_id_FK');

		$this->db->from(TBL_FOOD_ITEM);

		$this->db->join(TBL_VENUE, TBL_FOOD_ITEM.'.venue_id_FK = '.TBL_VENUE.'.venue_id');

		$this->db->join(TBL_CITY, TBL_VENUE.'.city_id_FK = '.TBL_CITY.'.city_id');

		$this->db->order_by("food_id", "desc");	

		$query = $this->db->get();

		return $query->result();	

	}	
	
	
	function get_latest_dish()
	{
	$this->db->select(''.TBL_FOOD_ITEM.'.food_id,'.TBL_FOOD_ITEM.'.food_name,'.TBL_FOOD_ITEM.'.food_image,'.TBL_FOOD_ITEM.'.food_description,'.TBL_FOOD_ITEM.'.created_date,'.TBL_FOOD_ITEM.'.user_id_FK,'.TBL_FOOD_ITEM.'.venue_id_FK,'.TBL_VENUE.'.venue_id,'.TBL_VENUE.'.venue_name,'.TBL_VENUE.'.venue_twitter_url,'.TBL_VENUE.'.venue_street_address,'.TBL_VENUE.'.venue_contact_number,'.TBL_VENUE.'.venue_postal_code,'.TBL_VENUE.'.venue_latitude,'.TBL_VENUE.'.venue_longitude,'.TBL_VENUE.'.country_id_FK,'.TBL_VENUE.'.state_id_FK,'.TBL_VENUE.'.city_id_FK,'.TBL_VENUE.'.venue_type_id_FK,'.TBL_CITY.'.city_id,'.TBL_CITY.'.city_name,'.TBL_CITY.'.latitude,'.TBL_CITY.'.longitude,'.TBL_CITY.'.state_id_FK');

		$this->db->from(TBL_FOOD_ITEM);

		$this->db->join(TBL_VENUE, TBL_FOOD_ITEM.'.venue_id_FK = '.TBL_VENUE.'.venue_id');

		$this->db->join(TBL_CITY, TBL_VENUE.'.city_id_FK = '.TBL_CITY.'.city_id');

		$this->db->order_by(TBL_FOOD_ITEM.'.created_date', "desc");	

		$query = $this->db->get();

		//echo $this->db->last_query(); die();

		return $query->result();	
	}
	
	
	function get_best_dish()
	{
	 $this->db->select(''.TBL_FOOD_ITEM.'.food_id,'.TBL_FOOD_ITEM.'.food_name,'.TBL_FOOD_ITEM.'.food_image,'.TBL_FOOD_ITEM.'.food_description,'.TBL_FOOD_ITEM.'.created_date,'.TBL_FOOD_ITEM.'.user_id_FK,'.TBL_FOOD_ITEM.'.venue_id_FK,'.TBL_VENUE.'.venue_id,'.TBL_VENUE.'.venue_name,'.TBL_VENUE.'.venue_twitter_url,'.TBL_VENUE.'.venue_street_address,'.TBL_VENUE.'.venue_contact_number,'.TBL_VENUE.'.venue_postal_code,'.TBL_VENUE.'.venue_latitude,'.TBL_VENUE.'.venue_longitude,'.TBL_VENUE.'.country_id_FK,'.TBL_VENUE.'.state_id_FK,'.TBL_VENUE.'.city_id_FK,'.TBL_VENUE.'.venue_type_id_FK,'.TBL_CITY.'.city_id,'.TBL_CITY.'.city_name,'.TBL_CITY.'.latitude,'.TBL_CITY.'.longitude,'.TBL_CITY.'.state_id_FK');

		$this->db->from(TBL_FOOD_ITEM);

		$this->db->join(TBL_VENUE, TBL_FOOD_ITEM.'.venue_id_FK = '.TBL_VENUE.'.venue_id');

		$this->db->join(TBL_CITY, TBL_VENUE.'.city_id_FK = '.TBL_CITY.'.city_id');

		$this->db->order_by("food_id", "desc");	

		$query = $this->db->get();

		return $query->result();	
	}

}

/* End of file model_dish_listing_webservice.php */
/* Location: ./application/models/model_dish_listing_webservice.php */ 
?>