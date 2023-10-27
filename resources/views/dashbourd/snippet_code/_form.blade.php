<div class="row">
    <x-bladewind.textarea 
    id="ndn"
    required="true"
    name="google_script"
    label="google script" 
    :selected_value="$google_script" 
    show_error_inline="true"
    error_heading="Error"
    error_message="A comment is required" required/>
    
    <x-bladewind.textarea 
    id="nxc"
    name="google_noscript"
    required="true"
    label="google noscript"
   :selected_value="$google_noscript"/>
</div>