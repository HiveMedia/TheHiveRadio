<?php namespace Icebreath;

class Response {

    // Whether or not the module errored and supplied a error
    private $errored = false;
    // The error the module supploed
    private $error   = null;

    // The HTTP code the module wants the response returned with
    private $code    = 200;

    // The response the module wants returned if there are no errors
    private $output  = null;

    /**
     * Builds a response to pass back to Icebreath for it to parse and return to the requester
     *
     * @param $output
     * @param int $code
     * @param null $error
     */
    public function __construct($output, $code=200, $error=null) {
        $this->output = $output;
        $this->code = $code;

        if(isset($error)) {
            $this->errored = true;
            $this->error = $error;
        }
    }

    /**
     * Gets whether or not the module threw a error while handling a request
     *
     * @return bool
     */
    public function hasErrored() { return $this->errored; }

    /**
     * Returns the error the module supplied when it ended processing the request
     *
     * @return mixed
     */
    public function getError() { return $this->error; }

    /**
     * Returns the HTTP code to use when returning the response to the requester
     * @return int
     */
    public function getHTTPCode() { return $this->code; }

    /**
     * Returns the output from the module
     *
     * @return mixed
     */
    public function getOutput() { return $this->output; }
}