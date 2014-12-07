<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg10.php" ?>
<?php include_once "ewmysql10.php" ?>
<?php include_once "phpfn10.php" ?>
<?php include_once "proveedorinfo.php" ?>
<?php include_once "userfn10.php" ?>
<?php

//
// Page class
//

$proveedor_add = NULL; // Initialize page object first

class cproveedor_add extends cproveedor {

	// Page ID
	var $PageID = 'add';

	// Project ID
	var $ProjectID = "{1C6EAAA4-783D-4754-BFD0-A4DD922C271D}";

	// Table name
	var $TableName = 'proveedor';

	// Page object name
	var $PageObjName = 'proveedor_add';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		if ($this->UseTokenInUrl) $PageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EW_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_WARNING_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sMessage . "</div>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sWarningMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sWarningMessage;
			$html .= "<div class=\"alert alert-warning ewWarning\">" . $sWarningMessage . "</div>";
			$_SESSION[EW_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sSuccessMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sSuccessMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sSuccessMessage . "</div>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sErrorMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sErrorMessage;
			$html .= "<div class=\"alert alert-error ewError\">" . $sErrorMessage . "</div>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<table class=\"ewStdTable\"><tr><td><div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div></td></tr></table>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p>" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Footer exists, display
			echo "<p>" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm;
		if ($this->UseTokenInUrl) {
			if ($objForm)
				return ($this->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($this->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $Language;
		$GLOBALS["Page"] = &$this;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (proveedor)
		if (!isset($GLOBALS["proveedor"]) || get_class($GLOBALS["proveedor"]) == "cproveedor") {
			$GLOBALS["proveedor"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["proveedor"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'proveedor', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;

		// Create form object
		$objForm = new cFormObj();
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
		global $gbOldSkipHeaderFooter, $gbSkipHeaderFooter;
		$gbOldSkipHeaderFooter = $gbSkipHeaderFooter;
		$gbSkipHeaderFooter = TRUE;

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;
		global $gbOldSkipHeaderFooter, $gbSkipHeaderFooter;
		$gbSkipHeaderFooter = $gbOldSkipHeaderFooter;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		$this->Page_Redirecting($url);

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
	}
	var $DbMasterFilter = "";
	var $DbDetailFilter = "";
	var $Priv = 0;
	var $OldRecordset;
	var $CopyRecord;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError;

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
			$this->CurrentAction = $_POST["a_add"]; // Get form action
			$this->CopyRecord = $this->LoadOldRecord(); // Load old recordset
			$this->LoadFormValues(); // Load form values
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (@$_GET["rif"] != "") {
				$this->rif->setQueryStringValue($_GET["rif"]);
				$this->setKey("rif", $this->rif->CurrentValue); // Set up key
			} else {
				$this->setKey("rif", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "C"; // Copy record
			} else {
				$this->CurrentAction = "I"; // Display blank record
				$this->LoadDefaultValues(); // Load default values
			}
		}

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Validate form if post back
		if (@$_POST["a_add"] <> "") {
			if (!$this->ValidateForm()) {
				$this->CurrentAction = "I"; // Form error, reset action
				$this->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues(); // Restore form values
				$this->setFailureMessage($gsFormError);
			}
		}

		// Perform action based on action code
		switch ($this->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "C": // Copy an existing record
				if (!$this->LoadRow()) { // Load record based on key
					if ($this->getFailureMessage() == "") $this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("proveedorlist.php"); // No matching record, return to list
				}
				break;
			case "A": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$sReturnUrl = $this->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "proveedorview.php")
						$sReturnUrl = $this->GetViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row based on row type
		$this->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->ResetAttrs();
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		$this->rif->CurrentValue = NULL;
		$this->rif->OldValue = $this->rif->CurrentValue;
		$this->direccion->CurrentValue = NULL;
		$this->direccion->OldValue = $this->direccion->CurrentValue;
		$this->telefono->CurrentValue = NULL;
		$this->telefono->OldValue = $this->telefono->CurrentValue;
		$this->razon_social->CurrentValue = NULL;
		$this->razon_social->OldValue = $this->razon_social->CurrentValue;
		$this->persona_contacto->CurrentValue = NULL;
		$this->persona_contacto->OldValue = $this->persona_contacto->CurrentValue;
		$this->status_proveedor->CurrentValue = Activo;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->rif->FldIsDetailKey) {
			$this->rif->setFormValue($objForm->GetValue("x_rif"));
		}
		if (!$this->direccion->FldIsDetailKey) {
			$this->direccion->setFormValue($objForm->GetValue("x_direccion"));
		}
		if (!$this->telefono->FldIsDetailKey) {
			$this->telefono->setFormValue($objForm->GetValue("x_telefono"));
		}
		if (!$this->razon_social->FldIsDetailKey) {
			$this->razon_social->setFormValue($objForm->GetValue("x_razon_social"));
		}
		if (!$this->persona_contacto->FldIsDetailKey) {
			$this->persona_contacto->setFormValue($objForm->GetValue("x_persona_contacto"));
		}
		if (!$this->status_proveedor->FldIsDetailKey) {
			$this->status_proveedor->setFormValue($objForm->GetValue("x_status_proveedor"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->LoadOldRecord();
		$this->rif->CurrentValue = $this->rif->FormValue;
		$this->direccion->CurrentValue = $this->direccion->FormValue;
		$this->telefono->CurrentValue = $this->telefono->FormValue;
		$this->razon_social->CurrentValue = $this->razon_social->FormValue;
		$this->persona_contacto->CurrentValue = $this->persona_contacto->FormValue;
		$this->status_proveedor->CurrentValue = $this->status_proveedor->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Language;
		$sFilter = $this->KeyFilter();

		// Call Row Selecting event
		$this->Row_Selecting($sFilter);

		// Load SQL based on filter
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row = &$rs->fields;
		$this->Row_Selected($row);
		$this->rif->setDbValue($rs->fields('rif'));
		$this->direccion->setDbValue($rs->fields('direccion'));
		$this->telefono->setDbValue($rs->fields('telefono'));
		$this->razon_social->setDbValue($rs->fields('razon_social'));
		$this->persona_contacto->setDbValue($rs->fields('persona_contacto'));
		$this->status_proveedor->setDbValue($rs->fields('status_proveedor'));
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF) return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->rif->DbValue = $row['rif'];
		$this->direccion->DbValue = $row['direccion'];
		$this->telefono->DbValue = $row['telefono'];
		$this->razon_social->DbValue = $row['razon_social'];
		$this->persona_contacto->DbValue = $row['persona_contacto'];
		$this->status_proveedor->DbValue = $row['status_proveedor'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("rif")) <> "")
			$this->rif->CurrentValue = $this->getKey("rif"); // rif
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$this->CurrentFilter = $this->KeyFilter();
			$sSql = $this->SQL();
			$this->OldRecordset = ew_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		} else {
			$this->OldRecordset = NULL;
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language;
		global $gsLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// rif
		// direccion
		// telefono
		// razon_social
		// persona_contacto
		// status_proveedor

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

			// rif
			$this->rif->ViewValue = $this->rif->CurrentValue;
			$this->rif->ViewCustomAttributes = "";

			// direccion
			$this->direccion->ViewValue = $this->direccion->CurrentValue;
			$this->direccion->ViewCustomAttributes = "";

			// telefono
			$this->telefono->ViewValue = $this->telefono->CurrentValue;
			$this->telefono->ViewCustomAttributes = "";

			// razon_social
			$this->razon_social->ViewValue = $this->razon_social->CurrentValue;
			$this->razon_social->ViewCustomAttributes = "";

			// persona_contacto
			$this->persona_contacto->ViewValue = $this->persona_contacto->CurrentValue;
			$this->persona_contacto->ViewCustomAttributes = "";

			// status_proveedor
			$this->status_proveedor->ViewValue = $this->status_proveedor->CurrentValue;
			$this->status_proveedor->ViewCustomAttributes = "";

			// rif
			$this->rif->LinkCustomAttributes = "";
			$this->rif->HrefValue = "";
			$this->rif->TooltipValue = "";

			// direccion
			$this->direccion->LinkCustomAttributes = "";
			$this->direccion->HrefValue = "";
			$this->direccion->TooltipValue = "";

			// telefono
			$this->telefono->LinkCustomAttributes = "";
			$this->telefono->HrefValue = "";
			$this->telefono->TooltipValue = "";

			// razon_social
			$this->razon_social->LinkCustomAttributes = "";
			$this->razon_social->HrefValue = "";
			$this->razon_social->TooltipValue = "";

			// persona_contacto
			$this->persona_contacto->LinkCustomAttributes = "";
			$this->persona_contacto->HrefValue = "";
			$this->persona_contacto->TooltipValue = "";

			// status_proveedor
			$this->status_proveedor->LinkCustomAttributes = "";
			$this->status_proveedor->HrefValue = "";
			$this->status_proveedor->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_ADD) { // Add row

			// rif
			$this->rif->EditCustomAttributes = "";
			$this->rif->EditValue = ew_HtmlEncode($this->rif->CurrentValue);
			$this->rif->PlaceHolder = ew_RemoveHtml($this->rif->FldCaption());

			// direccion
			$this->direccion->EditCustomAttributes = "";
			$this->direccion->EditValue = ew_HtmlEncode($this->direccion->CurrentValue);
			$this->direccion->PlaceHolder = ew_RemoveHtml($this->direccion->FldCaption());

			// telefono
			$this->telefono->EditCustomAttributes = "";
			$this->telefono->EditValue = ew_HtmlEncode($this->telefono->CurrentValue);
			$this->telefono->PlaceHolder = ew_RemoveHtml($this->telefono->FldCaption());

			// razon_social
			$this->razon_social->EditCustomAttributes = "";
			$this->razon_social->EditValue = ew_HtmlEncode($this->razon_social->CurrentValue);
			$this->razon_social->PlaceHolder = ew_RemoveHtml($this->razon_social->FldCaption());

			// persona_contacto
			$this->persona_contacto->EditCustomAttributes = "";
			$this->persona_contacto->EditValue = ew_HtmlEncode($this->persona_contacto->CurrentValue);
			$this->persona_contacto->PlaceHolder = ew_RemoveHtml($this->persona_contacto->FldCaption());

			// status_proveedor
			$this->status_proveedor->EditCustomAttributes = "";
			$this->status_proveedor->EditValue = ew_HtmlEncode($this->status_proveedor->CurrentValue);
			$this->status_proveedor->PlaceHolder = ew_RemoveHtml($this->status_proveedor->FldCaption());

			// Edit refer script
			// rif

			$this->rif->HrefValue = "";

			// direccion
			$this->direccion->HrefValue = "";

			// telefono
			$this->telefono->HrefValue = "";

			// razon_social
			$this->razon_social->HrefValue = "";

			// persona_contacto
			$this->persona_contacto->HrefValue = "";

			// status_proveedor
			$this->status_proveedor->HrefValue = "";
		}
		if ($this->RowType == EW_ROWTYPE_ADD ||
			$this->RowType == EW_ROWTYPE_EDIT ||
			$this->RowType == EW_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$this->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!$this->rif->FldIsDetailKey && !is_null($this->rif->FormValue) && $this->rif->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->rif->FldCaption());
		}
		if (!$this->direccion->FldIsDetailKey && !is_null($this->direccion->FormValue) && $this->direccion->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->direccion->FldCaption());
		}
		if (!$this->telefono->FldIsDetailKey && !is_null($this->telefono->FormValue) && $this->telefono->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->telefono->FldCaption());
		}
		if (!$this->razon_social->FldIsDetailKey && !is_null($this->razon_social->FormValue) && $this->razon_social->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->razon_social->FldCaption());
		}
		if (!$this->persona_contacto->FldIsDetailKey && !is_null($this->persona_contacto->FormValue) && $this->persona_contacto->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->persona_contacto->FldCaption());
		}
		if (!$this->status_proveedor->FldIsDetailKey && !is_null($this->status_proveedor->FormValue) && $this->status_proveedor->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->status_proveedor->FldCaption());
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			ew_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	// Add record
	function AddRow($rsold = NULL) {
		global $conn, $Language, $Security;

		// Load db values from rsold
		if ($rsold) {
			$this->LoadDbValues($rsold);
		}
		$rsnew = array();

		// rif
		$this->rif->SetDbValueDef($rsnew, $this->rif->CurrentValue, 0, FALSE);

		// direccion
		$this->direccion->SetDbValueDef($rsnew, $this->direccion->CurrentValue, "", FALSE);

		// telefono
		$this->telefono->SetDbValueDef($rsnew, $this->telefono->CurrentValue, "", FALSE);

		// razon_social
		$this->razon_social->SetDbValueDef($rsnew, $this->razon_social->CurrentValue, "", FALSE);

		// persona_contacto
		$this->persona_contacto->SetDbValueDef($rsnew, $this->persona_contacto->CurrentValue, "", FALSE);

		// status_proveedor
		$this->status_proveedor->SetDbValueDef($rsnew, $this->status_proveedor->CurrentValue, "", FALSE);

		// Call Row Inserting event
		$rs = ($rsold == NULL) ? NULL : $rsold->fields;
		$bInsertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($bInsertRow && $this->ValidateKey && $this->rif->CurrentValue == "" && $this->rif->getSessionValue() == "") {
			$this->setFailureMessage($Language->Phrase("InvalidKeyValue"));
			$bInsertRow = FALSE;
		}

		// Check for duplicate key
		if ($bInsertRow && $this->ValidateKey) {
			$sFilter = $this->KeyFilter();
			$rsChk = $this->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, $Language->Phrase("DupKey"));
				$this->setFailureMessage($sKeyErrMsg);
				$rsChk->Close();
				$bInsertRow = FALSE;
			}
		}
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $this->Insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($AddRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$AddRow = FALSE;
		}

		// Get insert id if necessary
		if ($AddRow) {
		}
		if ($AddRow) {

			// Call Row Inserted event
			$rs = ($rsold == NULL) ? NULL : $rsold->fields;
			$this->Row_Inserted($rs, $rsnew);
		}
		return $AddRow;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$Breadcrumb->Add("list", $this->TableVar, "proveedorlist.php", $this->TableVar, TRUE);
		$PageId = ($this->CurrentAction == "C") ? "Copy" : "Add";
		$Breadcrumb->Add("add", $PageId, ew_CurrentUrl());
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($proveedor_add)) $proveedor_add = new cproveedor_add();

// Page init
$proveedor_add->Page_Init();

// Page main
$proveedor_add->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$proveedor_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var proveedor_add = new ew_Page("proveedor_add");
proveedor_add.PageID = "add"; // Page ID
var EW_PAGE_ID = proveedor_add.PageID; // For backward compatibility

// Form object
var fproveedoradd = new ew_Form("fproveedoradd");

// Validate form
fproveedoradd.Validate = function() {
	if (!this.ValidateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.GetForm(), $fobj = $(fobj);
	this.PostAutoSuggest();
	if ($fobj.find("#a_confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.FormKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = $fobj.find("#a_list").val() == "gridinsert";
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
			elm = this.GetElements("x" + infix + "_rif");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($proveedor->rif->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_direccion");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($proveedor->direccion->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_telefono");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($proveedor->telefono->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_razon_social");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($proveedor->razon_social->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_persona_contacto");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($proveedor->persona_contacto->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_status_proveedor");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($proveedor->status_proveedor->FldCaption()) ?>");

			// Set up row object
			ew_ElementsToRow(fobj);

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ewForms[val])
			if (!ewForms[val].Validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fproveedoradd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fproveedoradd.ValidateRequired = true;
<?php } else { ?>
fproveedoradd.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $Breadcrumb->Render(); ?>
<?php $proveedor_add->ShowPageHeader(); ?>
<?php
$proveedor_add->ShowMessage();
?>
<form name="fproveedoradd" id="fproveedoradd" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="proveedor">
<input type="hidden" name="a_add" id="a_add" value="A">
<table class="ewGrid"><tr><td>
<table id="tbl_proveedoradd" class="table table-bordered table-striped">
<?php if ($proveedor->rif->Visible) { // rif ?>
	<tr id="r_rif">
		<td><span id="elh_proveedor_rif"><?php echo $proveedor->rif->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $proveedor->rif->CellAttributes() ?>>
<span id="el_proveedor_rif" class="control-group">
<input type="text" data-field="x_rif" name="x_rif" id="x_rif" size="20" placeholder="<?php echo ew_HtmlEncode($proveedor->rif->PlaceHolder) ?>" value="<?php echo $proveedor->rif->EditValue ?>"<?php echo $proveedor->rif->EditAttributes() ?>>
</span>
<?php echo $proveedor->rif->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($proveedor->direccion->Visible) { // direccion ?>
	<tr id="r_direccion">
		<td><span id="elh_proveedor_direccion"><?php echo $proveedor->direccion->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $proveedor->direccion->CellAttributes() ?>>
<span id="el_proveedor_direccion" class="control-group">
<input type="text" data-field="x_direccion" name="x_direccion" id="x_direccion" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($proveedor->direccion->PlaceHolder) ?>" value="<?php echo $proveedor->direccion->EditValue ?>"<?php echo $proveedor->direccion->EditAttributes() ?>>
</span>
<?php echo $proveedor->direccion->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($proveedor->telefono->Visible) { // telefono ?>
	<tr id="r_telefono">
		<td><span id="elh_proveedor_telefono"><?php echo $proveedor->telefono->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $proveedor->telefono->CellAttributes() ?>>
<span id="el_proveedor_telefono" class="control-group">
<input type="text" data-field="x_telefono" name="x_telefono" id="x_telefono" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($proveedor->telefono->PlaceHolder) ?>" value="<?php echo $proveedor->telefono->EditValue ?>"<?php echo $proveedor->telefono->EditAttributes() ?>>
</span>
<?php echo $proveedor->telefono->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($proveedor->razon_social->Visible) { // razon_social ?>
	<tr id="r_razon_social">
		<td><span id="elh_proveedor_razon_social"><?php echo $proveedor->razon_social->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $proveedor->razon_social->CellAttributes() ?>>
<span id="el_proveedor_razon_social" class="control-group">
<input type="text" data-field="x_razon_social" name="x_razon_social" id="x_razon_social" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($proveedor->razon_social->PlaceHolder) ?>" value="<?php echo $proveedor->razon_social->EditValue ?>"<?php echo $proveedor->razon_social->EditAttributes() ?>>
</span>
<?php echo $proveedor->razon_social->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($proveedor->persona_contacto->Visible) { // persona_contacto ?>
	<tr id="r_persona_contacto">
		<td><span id="elh_proveedor_persona_contacto"><?php echo $proveedor->persona_contacto->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $proveedor->persona_contacto->CellAttributes() ?>>
<span id="el_proveedor_persona_contacto" class="control-group">
<input type="text" data-field="x_persona_contacto" name="x_persona_contacto" id="x_persona_contacto" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($proveedor->persona_contacto->PlaceHolder) ?>" value="<?php echo $proveedor->persona_contacto->EditValue ?>"<?php echo $proveedor->persona_contacto->EditAttributes() ?>>
</span>
<?php echo $proveedor->persona_contacto->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($proveedor->status_proveedor->Visible) { // status_proveedor ?>
	<tr id="r_status_proveedor">
		<td><span id="elh_proveedor_status_proveedor"><?php echo $proveedor->status_proveedor->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $proveedor->status_proveedor->CellAttributes() ?>>
<span id="el_proveedor_status_proveedor" class="control-group">
<input type="text" data-field="x_status_proveedor" name="x_status_proveedor" id="x_status_proveedor" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($proveedor->status_proveedor->PlaceHolder) ?>" value="<?php echo $proveedor->status_proveedor->EditValue ?>"<?php echo $proveedor->status_proveedor->EditAttributes() ?>>
</span>
<?php echo $proveedor->status_proveedor->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</td></tr></table>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
</form>
<script type="text/javascript">
fproveedoradd.Init();
<?php if (EW_MOBILE_REFLOW && ew_IsMobile()) { ?>
ew_Reflow();
<?php } ?>
</script>
<?php
$proveedor_add->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$proveedor_add->Page_Terminate();
?>
