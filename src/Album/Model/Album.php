<?php
namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album implements InputFilterAwareInterface
{
	public $id;
	public $artist;
	public $title;
	protected $inputFilter;                       
	
	/**
	 * @method exchangeArray
	 * @param $data
	 */
	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id']))     ? $data['id']     : null;
		$this->artist = (isset($data['artist'])) ? $data['artist'] : null;
		$this->title  = (isset($data['title']))  ? $data['title']  : null;
	}
	
	/**
	 * @method getArrayCopy
	 */
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	
	/**
	 * @method setInputFilter
	 */
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	/**
	 * @method getInputFilter
	 */
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			
			$inputFilter->add(array(
			'name'     => 'id',
			'required' => true,
			'filters'  => array(
			array('name' => 'Int'),
			),
			));
			
			$inputFilter->add(array(
			'name'     => 'artist',
			'required' => true,
			'filters'  => array(
			array('name' => 'StripTags'),
			array('name' => 'StringTrim'),
			),
			'validators' => array(
			array(
			'name'    => 'StringLength',
			'options' => array(
			'encoding' => 'UTF-8',
			'min'      => 1,
			'max'      => 100,
			),
			),
			),
			));
			
			$inputFilter->add(array(
				'name'     => 'title',
				'required' => true,
				'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
				),
			
				'validators' => array(
					array(
						'name'    => 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min'      => 1,
							'max'      => 100,
						),
					),
				),
			));
			
			$this->inputFilter = $inputFilter;
		}
		
		return $this->inputFilter;
	}
	
}
