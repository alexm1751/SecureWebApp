<?php
/**
 * class SMSXmlParser
 *
 * Parses a given XML string and returns an associative array
 *
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 */

class SMSXmlParser
{
    private $c_xml_parser;							  // handle to instance of the XML parser
    private $c_arr_parsed_data;	          // array holds extracted data
    private $c_element_name;	            // store the current element name
    private $c_arr_temporary_attributes;	// temporarily store tag attributes and values
    private $c_xml_string_to_parse;

    public function __construct()
    {
        $this->c_arr_parsed_data = [];
    }

    // release retained memory
    public function __destruct()
    {
        if (is_null($this->c_xml_parser)) {
            return;
        } else {
            xml_parser_free($this->c_xml_parser);
        }

    }

    /**Sets the current instance of SMSXmlParser $c_xml_string_to_parse property
     * @param $p_xml_string_to_parse String containing XML
     * @throws Exception Error thrown if null is passed in as an argument
     */
    public function set_xml_string_to_parse($p_xml_string_to_parse)
    {
        if ($p_xml_string_to_parse === "" || is_null($p_xml_string_to_parse)) {
            throw new Exception("XML is empty");
        }

        $this->c_xml_string_to_parse = $p_xml_string_to_parse;
    }

    /**Returns and array of string containing parsed XML
     * @return array XMl data as an array of strings
     */
    public function get_parsed_data()
    {
        return $this->c_arr_parsed_data;
    }

    /**
     * Parses the current XML stored within this instance of the SMSXmlParser
     */
    public function parse_the_xml_string()
    {
        $this->c_xml_parser = xml_parser_create();

        xml_set_object($this->c_xml_parser, $this);

        // assign functions to be called when a new element is entered and exited
        xml_set_element_handler($this->c_xml_parser, "open_element", "close_element");

        // assign the function to be used when an element contains data
        xml_set_character_data_handler($this->c_xml_parser, "process_element_data");

        $this->parse_the_data_string();
    }

    // use the parser to step through the element tags
    private function parse_the_data_string()
    {
        xml_parse($this->c_xml_parser, $this->c_xml_string_to_parse);
    }

    // process an open element event & store the tag name
    // extract the attribute names and values, if any
    private function open_element($p_parser, $p_element_name, $p_attributes)
    {
        $this->c_element_name = $p_element_name;
        if (sizeof($p_attributes) > 0)
        {
            foreach ($p_attributes as $m_att_name => $m_att_value)
            {
                $m_tag_att = $p_element_name . "." . $m_att_name;
                $this->c_arr_temporary_attributes[$m_tag_att] = $m_att_value;
            }
        }
    }

    // process data from an element
    private function process_element_data($p_parser, $p_element_data)
    {
        if (array_key_exists($this->c_element_name, $this->c_arr_parsed_data) === false)
        {
            $this->c_arr_parsed_data[$this->c_element_name] = $p_element_data;
            if (sizeof($this->c_arr_temporary_attributes) > 0)
            {
                foreach ($this->c_arr_temporary_attributes as $m_tag_att_name => $m_tag_att_value)
                {
                    $this->c_arr_parsed_data[$m_tag_att_name] = $m_tag_att_value;
                }
            }
        }
    }

    // process a close element event
    private function close_element($p_parser, $p_element_name)
    {
        // do nothing here
    }

    public function set_xml_parser($p_obj_xml_parser)
    {
        $this->c_obj_xml_parser = $p_obj_xml_parser;
    }

    /**
     * Clears the current data stored in this instance of the SMSXmlParser so it may be reused
     */
    public function clear_data()
    {
        $this->c_arr_parsed_data = [];
    }
}