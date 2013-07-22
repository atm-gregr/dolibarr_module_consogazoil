<?php
/*
 * Copyright (C) 2013  Florian Henry   <florian.henry@open-concept.pro>
 * 
*
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * \file consogazoil/class/html.formconsogazoil.class.php
 * \brief Class for HML form
 */
class FormConsoGazoil extends Form {
	var $db;
	var $error;
	
	/**
	 * Constructor
	 * 
	 * @param DoliDB $db handler
	 */
	function __construct($db) {
		$this->db = $db;
		return 1;
	}
	
	/**
	 * Display select with Service available
	 * 
	 * @param int $selectid à preselectionner
	 * @param string $htmlname select field
	 * @return string select field
	 */
	function select_service($selectid, $htmlname = 'service') {
		global $conf, $user, $langs;
		
		require_once 'consogazoilservice.class.php';
		
		$out = '';
		
		$object = new ConsogazoilService ( $this->db );
		
		$num = $object->fetch_all ();
		
		if ($num >= 0) {
			$out .= '<select id="' . $htmlname . '" class="flat" name="' . $htmlname . '">';
			
			$i = 0;

			foreach ( $object->lines as $line ) {
				
				if ($selectid > 0 && $selectid == $line->id) {
					$out .= '<option value="' . $line->id . '" selected="selected">' . $line->label . '</option>';
				} else {
					$out .= '<option value="' . $line->id . '">' . $line->label . '</option>';
				}
			}

			$out .= '</select>';
		} else {
			setEventMessage ( $object->error, 'errors' );
		}
		
		return $out;
	}
	
	/**
	 * Display select with data available
	 *
	 * @param int $selectid à preselectionner
	 * @param string $htmlname select field
	 * @return string select field
	 */
	function select_vehicule($selectid, $htmlname = 'vehicule') {
		global $conf, $user, $langs;
	
		require_once 'consogazoilvehicule.class.php';
	
		$out = '';
	
		$object = new ConsogazoilVehicule ( $this->db );
	
		$num = $object->fetch_all ();
	
		if ($num >= 0) {
			$out .= '<select id="' . $htmlname . '" class="flat" name="' . $htmlname . '">';
				
			$i = 0;
	
			foreach ( $object->lines as $line ) {
	
				if ($selectid > 0 && $selectid == $line->id) {
					$out .= '<option value="' . $line->id . '" selected="selected">' . $line->ref.'-'.$line->immat_veh . '</option>';
				} else {
					$out .= '<option value="' . $line->id . '">' .$line->ref.'-'.$line->immat_veh . '</option>';
				}
			}
	
			$out .= '</select>';
		} else {
			setEventMessage ( $object->error, 'errors' );
		}
	
		return $out;
	}
	
	/**
	 * Display select with data available
	 *
	 * @param int $selectid à preselectionner
	 * @param string $htmlname select field
	 * @return string select field
	 */
	function select_station($selectid, $htmlname = 'station') {
		global $conf, $user, $langs;
	
		require_once 'consogazoilstation.class.php';
	
		$out = '';
	
		$object = new ConsogazoilStation ( $this->db );
	
		$num = $object->fetch_all ();
	
		if ($num >= 0) {
			$out .= '<select id="' . $htmlname . '" class="flat" name="' . $htmlname . '">';
	
			$i = 0;
	
			foreach ( $object->lines as $line ) {
	
				if ($selectid > 0 && $selectid == $line->id) {
					$out .= '<option value="' . $line->id . '" selected="selected">' . $line->ref.'-'.$line->name . '</option>';
				} else {
					$out .= '<option value="' . $line->id . '">' .$line->ref.'-'.$line->name . '</option>';
				}
			}
	
			$out .= '</select>';
		} else {
			setEventMessage ( $object->error, 'errors' );
		}
	
		return $out;
	}
	
	/**
	 * Display select with data available
	 *
	 * @param int $selectid à preselectionner
	 * @param string $htmlname select field
	 * @return string select field
	 */
	function select_driver($selectid, $htmlname = 'driver') {
		global $conf, $user, $langs;
	
		require_once 'consogazoildriver.class.php';
	
		$out = '';
	
		$object = new ConsogazoilDriver ( $this->db );
	
		$num = $object->fetch_all ();
	
		if ($num >= 0) {
			$out .= '<select id="' . $htmlname . '" class="flat" name="' . $htmlname . '">';
	
			$i = 0;
	
			foreach ( $object->lines as $line ) {
	
				if ($selectid > 0 && $selectid == $line->id) {
					$out .= '<option value="' . $line->id . '" selected="selected">' . $line->ref.'-'.$line->name . '</option>';
				} else {
					$out .= '<option value="' . $line->id . '">' .$line->ref.'-'.$line->name . '</option>';
				}
			}
	
			$out .= '</select>';
		} else {
			setEventMessage ( $object->error, 'errors' );
		}
	
		return $out;
	}
}
