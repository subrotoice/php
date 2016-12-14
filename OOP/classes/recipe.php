<?php

class Recipe
{
  private $title;
  private $ingredients = array();
  private $instructions = array();
  private $yield;
  private $tag = array();
  private $source = "Alena Holligan";

  private $measurements = array(
    "tsp",
    "tbsp",
    "cup",
    "oz",
    "lb",
    "fl oz",
    "pint",
    "quart",
    "gallon"
  );

  public function __construct($title = null)
  {
    $this->setTitle($title);
  }
  public function __toString()
  {
    $output = "<br />You are calling a " . __CLASS__ . " class object with the title \"";
    $output .= $this->getTitle() . "\"";
    $output .= "<br />Full Path with file name " . __FILE__ . ".";
    $output .= "<br />It is stored in " . basename(__FILE__) . " at " . __DIR__ . ".";
    $output .= "<br />This display is form line " . __LINE__ . " in method " . __METHOD__;
    $output .= "<br />The following methods are available for objects of this class. <br />";
    $output .= implode("<br />",get_class_methods(__CLASS__));
    return $output;
  }
  public function setTitle($title)
  {
    if (empty($title)) {
      $this->title = null;
    } else {
        $this->title = ucwords($title);
    }
  }
  public function getTitle()
  {
    return $this->title;
  }

  public function addIngredient($item, $amount = null, $measure = null)
  {
    if ($amount != null && !is_float($amount) && !is_int($amount)) {
      exit("Amount must be float: " . gettype($amount) . " $amount given");
    }
    if ($measure != null && !in_array(strtolower($measure), $this->measurements)) {
      exit("Please enter a valid measurements " . implode(", ", $this->measurements));
    }
    $this->ingredients[] = array(
      "item" => ucwords($item),
      "amount" => $amount,
      "measure" => strtolower($measure)
    );
  }
  public function getIngredient()
  {
    return $this->ingredients;
  }
  public function addInstruction($string)
  {
    $this->instructions[] = $string;
  }
  public function getInstructions()
  {
    return $this->instructions;
  }
  public function addTag($string)
  {
    $this->tag[] = strtolower($string);
  }
  public function getTags()
  {
    return $this->tag;
  }
  public function setYield($yield)
  {
    $this->yield = $yield;
  }
  public function getYield()
  {
    return $this->yield;
  }
  public function setSource($source)
  {
    $this->source = ucwords($source);
  }
  public function getSource()
  {
    return $this->source;
  }
}
