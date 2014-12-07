<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg10.php" ?>
<?php include_once "ewmysql10.php" ?>
<?php include_once "phpfn10.php" ?>
<?php include_once "productoinfo.php" ?>
<?php include_once "userfn10.php" ?>
<?php

//
// Page class
//

$producto_edit = NULL; // Initialize page object first

class cproducto_edit extends cproducto {

	// Page ID
	var $PageID = 'edit';

	// Project ID
	var $ProjectID = "{1C6EAAA4-783D-4754-BFD0-A4DD922C271D}";

	// Table name
	var $TableName = 'producto';

	// Page object name
	var $PageObjName = 'producto_edit';

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

		// Table object (producto)
		if (!isset($GLOBALS["producto"]) || get_class($GLOBALS["producto"]) == "cproducto") {
			$GLOBALS["producto"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["producto"];
		}

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'producto', TRUE);

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
		$this->codigo_producto->Visible = !$this->IsAdd() && !$this->IsCopy() && !$this->IsGridAdd();

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
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError;

		// Load key from QueryString
		if (@$_GET["codigo_producto"] <> "") {
			$this->codigo_producto->setQueryStringValue($_GET["codigo_producto"]);
		}

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Process form if post back
		if (@$_POST["a_edit"] <> "") {
			$this->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values
		} else {
			$this->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($this->codigo_producto->CurrentValue == "")
			$this->Page_Terminate("productolist.php"); // Invalid key, return to list

		// Validate form if post back
		if (@$_POST["a_edit"] <> "") {
			if (!$this->ValidateForm()) {
				$this->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		}
		switch ($this->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					if ($this->getFailureMessage() == "") $this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("productolist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$sReturnUrl = $this->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$this->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->ResetAttrs();
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[EW_TABLE_START_REC];
				$this->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->codigo_producto->FldIsDetailKey)
			$this->codigo_producto->setFormValue($objForm->GetValue("x_codigo_producto"));
		if (!$this->codigo_departamento->FldIsDetailKey) {
			$this->codigo_departamento->setFormValue($objForm->GetValue("x_codigo_departamento"));
		}
		if (!$this->nombre_producto->FldIsDetailKey) {
			$this->nombre_producto->setFormValue($objForm->GetValue("x_nombre_producto"));
		}
		if (!$this->stop_min->FldIsDetailKey) {
			$this->stop_min->setFormValue($objForm->GetValue("x_stop_min"));
		}
		if (!$this->stop_max->FldIsDetailKey) {
			$this->stop_max->setFormValue($objForm->GetValue("x_stop_max"));
		}
		if (!$this->cantidad_existencia->FldIsDetailKey) {
			$this->cantidad_existencia->setFormValue($objForm->GetValue("x_cantidad_existencia"));
		}
		if (!$this->status_producto->FldIsDetailKey) {
			$this->status_producto->setFormValue($objForm->GetValue("x_status_producto"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->LoadRow();
		$this->codigo_producto->CurrentValue = $this->codigo_producto->FormValue;
		$this->codigo_departamento->CurrentValue = $this->codigo_departamento->FormValue;
		$this->nombre_producto->CurrentValue = $this->nombre_producto->FormValue;
		$this->stop_min->CurrentValue = $this->stop_min->FormValue;
		$this->stop_max->CurrentValue = $this->stop_max->FormValue;
		$this->cantidad_existencia->CurrentValue = $this->cantidad_existencia->FormValue;
		$this->status_producto->CurrentValue = $this->status_producto->FormValue;
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
		$this->codigo_producto->setDbValue($rs->fields('codigo_producto'));
		$this->codigo_departamento->setDbValue($rs->fields('codigo_departamento'));
		$this->nombre_producto->setDbValue($rs->fields('nombre_producto'));
		$this->stop_min->setDbValue($rs->fields('stop_min'));
		$this->stop_max->setDbValue($rs->fields('stop_max'));
		$this->cantidad_existencia->setDbValue($rs->fields('cantidad_existencia'));
		$this->status_producto->setDbValue($rs->fields('status_producto'));
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF) return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->codigo_producto->DbValue = $row['codigo_producto'];
		$this->codigo_departamento->DbValue = $row['codigo_departamento'];
		$this->nombre_producto->DbValue = $row['nombre_producto'];
		$this->stop_min->DbValue = $row['stop_min'];
		$this->stop_max->DbValue = $row['stop_max'];
		$this->cantidad_existencia->DbValue = $row['cantidad_existencia'];
		$this->status_producto->DbValue = $row['status_producto'];
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language;
		global $gsLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// codigo_producto
		// codigo_departamento
		// nombre_producto
		// stop_min
		// stop_max
		// cantidad_existencia
		// status_producto

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

			// codigo_producto
			$this->codigo_producto->ViewValue = $this->codigo_producto->CurrentValue;
			$this->codigo_producto->ViewCustomAttributes = "";

			// codigo_departamento
			if (strval($this->codigo_departamento->CurrentValue) <> "") {
				switch ($this->codigo_departamento->CurrentValue) {
					case $this->codigo_departamento->FldTagValue(1):
						$this->codigo_departamento->ViewValue = $this->codigo_departamento->FldTagCaption(1) <> "" ? $this->codigo_departamento->FldTagCaption(1) : $this->codigo_departamento->CurrentValue;
						break;
					default:
						$this->codigo_departamento->ViewValue = $this->codigo_departamento->CurrentValue;
				}
			} else {
				$this->codigo_departamento->ViewValue = NULL;
			}
			$this->codigo_departamento->ViewCustomAttributes = "";

			// nombre_producto
			$this->nombre_producto->ViewValue = $this->nombre_producto->CurrentValue;
			$this->nombre_producto->ViewCustomAttributes = "";

			// stop_min
			$this->stop_min->ViewValue = $this->stop_min->CurrentValue;
			$this->stop_min->ViewCustomAttributes = "";

			// stop_max
			$this->stop_max->ViewValue = $this->stop_max->CurrentValue;
			$this->stop_max->ViewCustomAttributes = "";

			// cantidad_existencia
			$this->cantidad_existencia->ViewValue = $this->cantidad_existencia->CurrentValue;
			$this->cantidad_existencia->ViewCustomAttributes = "";

			// status_producto
			$this->status_producto->ViewValue = $this->status_producto->CurrentValue;
			$this->status_producto->ViewCustomAttributes = "";

			// codigo_producto
			$this->codigo_producto->LinkCustomAttributes = "";
			$this->codigo_producto->HrefValue = "";
			$this->codigo_producto->TooltipValue = "";

			// codigo_departamento
			$this->codigo_departamento->LinkCustomAttributes = "";
			$this->codigo_departamento->HrefValue = "";
			$this->codigo_departamento->TooltipValue = "";

			// nombre_producto
			$this->nombre_producto->LinkCustomAttributes = "";
			$this->nombre_producto->HrefValue = "";
			$this->nombre_producto->TooltipValue = "";

			// stop_min
			$this->stop_min->LinkCustomAttributes = "";
			$this->stop_min->HrefValue = "";
			$this->stop_min->TooltipValue = "";

			// stop_max
			$this->stop_max->LinkCustomAttributes = "";
			$this->stop_max->HrefValue = "";
			$this->stop_max->TooltipValue = "";

			// cantidad_existencia
			$this->cantidad_existencia->LinkCustomAttributes = "";
			$this->cantidad_existencia->HrefValue = "";
			$this->cantidad_existencia->TooltipValue = "";

			// status_producto
			$this->status_producto->LinkCustomAttributes = "";
			$this->status_producto->HrefValue = "";
			$this->status_producto->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// codigo_producto
			$this->codigo_producto->EditCustomAttributes = "";
			$this->codigo_producto->EditValue = $this->codigo_producto->CurrentValue;
			$this->codigo_producto->ViewCustomAttributes = "";

			// codigo_departamento
			$this->codigo_departamento->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array($this->codigo_departamento->FldTagValue(1), $this->codigo_departamento->FldTagCaption(1) <> "" ? $this->codigo_departamento->FldTagCaption(1) : $this->codigo_departamento->FldTagValue(1));
			array_unshift($arwrk, array("", $Language->Phrase("PleaseSelect")));
			$this->codigo_departamento->EditValue = $arwrk;

			// nombre_producto
			$this->nombre_producto->EditCustomAttributes = "";
			$this->nombre_producto->EditValue = ew_HtmlEncode($this->nombre_producto->CurrentValue);
			$this->nombre_producto->PlaceHolder = ew_RemoveHtml($this->nombre_producto->FldCaption());

			// stop_min
			$this->stop_min->EditCustomAttributes = "";
			$this->stop_min->EditValue = ew_HtmlEncode($this->stop_min->CurrentValue);
			$this->stop_min->PlaceHolder = ew_RemoveHtml($this->stop_min->FldCaption());

			// stop_max
			$this->stop_max->EditCustomAttributes = "";
			$this->stop_max->EditValue = ew_HtmlEncode($this->stop_max->CurrentValue);
			$this->stop_max->PlaceHolder = ew_RemoveHtml($this->stop_max->FldCaption());

			// cantidad_existencia
			$this->cantidad_existencia->EditCustomAttributes = "";
			$this->cantidad_existencia->EditValue = ew_HtmlEncode($this->cantidad_existencia->CurrentValue);
			$this->cantidad_existencia->PlaceHolder = ew_RemoveHtml($this->cantidad_existencia->FldCaption());

			// status_producto
			$this->status_producto->EditCustomAttributes = "";
			$this->status_producto->EditValue = ew_HtmlEncode($this->status_producto->CurrentValue);
			$this->status_producto->PlaceHolder = ew_RemoveHtml($this->status_producto->FldCaption());

			// Edit refer script
			// codigo_producto

			$this->codigo_producto->HrefValue = "";

			// codigo_departamento
			$this->codigo_departamento->HrefValue = "";

			// nombre_producto
			$this->nombre_producto->HrefValue = "";

			// stop_min
			$this->stop_min->HrefValue = "";

			// stop_max
			$this->stop_max->HrefValue = "";

			// cantidad_existencia
			$this->cantidad_existencia->HrefValue = "";

			// status_producto
			$this->status_producto->HrefValue = "";
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
		if (!$this->codigo_departamento->FldIsDetailKey && !is_null($this->codigo_departamento->FormValue) && $this->codigo_departamento->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->codigo_departamento->FldCaption());
		}
		if (!$this->nombre_producto->FldIsDetailKey && !is_null($this->nombre_producto->FormValue) && $this->nombre_producto->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->nombre_producto->FldCaption());
		}
		if (!$this->stop_min->FldIsDetailKey && !is_null($this->stop_min->FormValue) && $this->stop_min->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->stop_min->FldCaption());
		}
		if (!$this->stop_max->FldIsDetailKey && !is_null($this->stop_max->FormValue) && $this->stop_max->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->stop_max->FldCaption());
		}
		if (!$this->cantidad_existencia->FldIsDetailKey && !is_null($this->cantidad_existencia->FormValue) && $this->cantidad_existencia->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->cantidad_existencia->FldCaption());
		}
		if (!$this->status_producto->FldIsDetailKey && !is_null($this->status_producto->FormValue) && $this->status_producto->FormValue == "") {
			ew_AddMessage($gsFormError, $Language->Phrase("EnterRequiredField") . " - " . $this->status_producto->FldCaption());
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

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $Language;
		$sFilter = $this->KeyFilter();
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->LoadDbValues($rsold);
			$rsnew = array();

			// codigo_departamento
			$this->codigo_departamento->SetDbValueDef($rsnew, $this->codigo_departamento->CurrentValue, 0, $this->codigo_departamento->ReadOnly);

			// nombre_producto
			$this->nombre_producto->SetDbValueDef($rsnew, $this->nombre_producto->CurrentValue, "", $this->nombre_producto->ReadOnly);

			// stop_min
			$this->stop_min->SetDbValueDef($rsnew, $this->stop_min->CurrentValue, "", $this->stop_min->ReadOnly);

			// stop_max
			$this->stop_max->SetDbValueDef($rsnew, $this->stop_max->CurrentValue, "", $this->stop_max->ReadOnly);

			// cantidad_existencia
			$this->cantidad_existencia->SetDbValueDef($rsnew, $this->cantidad_existencia->CurrentValue, "", $this->cantidad_existencia->ReadOnly);

			// status_producto
			$this->status_producto->SetDbValueDef($rsnew, $this->status_producto->CurrentValue, "", $this->status_producto->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $this->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				if (count($rsnew) > 0)
					$EditRow = $this->Update($rsnew, "", $rsold);
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($EditRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$Breadcrumb->Add("list", $this->TableVar, "productolist.php", $this->TableVar, TRUE);
		$PageId = "edit";
		$Breadcrumb->Add("edit", $PageId, ew_CurrentUrl());
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
if (!isset($producto_edit)) $producto_edit = new cproducto_edit();

// Page init
$producto_edit->Page_Init();

// Page main
$producto_edit->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$producto_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var producto_edit = new ew_Page("producto_edit");
producto_edit.PageID = "edit"; // Page ID
var EW_PAGE_ID = producto_edit.PageID; // For backward compatibility

// Form object
var fproductoedit = new ew_Form("fproductoedit");

// Validate form
fproductoedit.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_codigo_departamento");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($producto->codigo_departamento->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_nombre_producto");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($producto->nombre_producto->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_stop_min");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($producto->stop_min->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_stop_max");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($producto->stop_max->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_cantidad_existencia");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($producto->cantidad_existencia->FldCaption()) ?>");
			elm = this.GetElements("x" + infix + "_status_producto");
			if (elm && !ew_HasValue(elm))
				return this.OnError(elm, ewLanguage.Phrase("EnterRequiredField") + " - <?php echo ew_JsEncode2($producto->status_producto->FldCaption()) ?>");

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
fproductoedit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fproductoedit.ValidateRequired = true;
<?php } else { ?>
fproductoedit.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $Breadcrumb->Render(); ?>
<?php $producto_edit->ShowPageHeader(); ?>
<?php
$producto_edit->ShowMessage();
?>
<form name="fproductoedit" id="fproductoedit" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="producto">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table class="ewGrid"><tr><td>
<table id="tbl_productoedit" class="table table-bordered table-striped">
<?php if ($producto->codigo_producto->Visible) { // codigo_producto ?>
	<tr id="r_codigo_producto">
		<td><span id="elh_producto_codigo_producto"><?php echo $producto->codigo_producto->FldCaption() ?></span></td>
		<td<?php echo $producto->codigo_producto->CellAttributes() ?>>
<span id="el_producto_codigo_producto" class="control-group">
<span<?php echo $producto->codigo_producto->ViewAttributes() ?>>
<?php echo $producto->codigo_producto->EditValue ?></span>
</span>
<input type="hidden" data-field="x_codigo_producto" name="x_codigo_producto" id="x_codigo_producto" value="<?php echo ew_HtmlEncode($producto->codigo_producto->CurrentValue) ?>">
<?php echo $producto->codigo_producto->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($producto->codigo_departamento->Visible) { // codigo_departamento ?>
	<tr id="r_codigo_departamento">
		<td><span id="elh_producto_codigo_departamento"><?php echo $producto->codigo_departamento->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $producto->codigo_departamento->CellAttributes() ?>>
<span id="el_producto_codigo_departamento" class="control-group">
<select data-field="x_codigo_departamento" id="x_codigo_departamento" name="x_codigo_departamento"<?php echo $producto->codigo_departamento->EditAttributes() ?>>
<?php
include('../../conexion.php');  //Conexion con la base de datos
			conectar();
		$consulta = "select * from departamento";
		$resultado = mysql_query($consulta);
		
		
		if(mysql_num_rows($resultado)) {

			while($detalles = mysql_fetch_array($resultado)) {

				echo'<OPTION VALUE="'.$detalles[0].'">'.$detalles[1].'</OPTION>';
			
			}

		}

?>
</select>
</span>
<?php echo $producto->codigo_departamento->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($producto->nombre_producto->Visible) { // nombre_producto ?>
	<tr id="r_nombre_producto">
		<td><span id="elh_producto_nombre_producto"><?php echo $producto->nombre_producto->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $producto->nombre_producto->CellAttributes() ?>>
<span id="el_producto_nombre_producto" class="control-group">
<input type="text" data-field="x_nombre_producto" name="x_nombre_producto" id="x_nombre_producto" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($producto->nombre_producto->PlaceHolder) ?>" value="<?php echo $producto->nombre_producto->EditValue ?>"<?php echo $producto->nombre_producto->EditAttributes() ?>>
</span>
<?php echo $producto->nombre_producto->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($producto->stop_min->Visible) { // stop_min ?>
	<tr id="r_stop_min">
		<td><span id="elh_producto_stop_min"><?php echo $producto->stop_min->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $producto->stop_min->CellAttributes() ?>>
<span id="el_producto_stop_min" class="control-group">
<input type="text" data-field="x_stop_min" name="x_stop_min" id="x_stop_min" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($producto->stop_min->PlaceHolder) ?>" value="<?php echo $producto->stop_min->EditValue ?>"<?php echo $producto->stop_min->EditAttributes() ?>>
</span>
<?php echo $producto->stop_min->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($producto->stop_max->Visible) { // stop_max ?>
	<tr id="r_stop_max">
		<td><span id="elh_producto_stop_max"><?php echo $producto->stop_max->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $producto->stop_max->CellAttributes() ?>>
<span id="el_producto_stop_max" class="control-group">
<input type="text" data-field="x_stop_max" name="x_stop_max" id="x_stop_max" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($producto->stop_max->PlaceHolder) ?>" value="<?php echo $producto->stop_max->EditValue ?>"<?php echo $producto->stop_max->EditAttributes() ?>>
</span>
<?php echo $producto->stop_max->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($producto->cantidad_existencia->Visible) { // cantidad_existencia ?>
	<tr id="r_cantidad_existencia">
		<td><span id="elh_producto_cantidad_existencia"><?php echo $producto->cantidad_existencia->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $producto->cantidad_existencia->CellAttributes() ?>>
<span id="el_producto_cantidad_existencia" class="control-group">
<input type="text" data-field="x_cantidad_existencia" name="x_cantidad_existencia" id="x_cantidad_existencia" size="30" maxlength="20" placeholder="<?php echo ew_HtmlEncode($producto->cantidad_existencia->PlaceHolder) ?>" value="<?php echo $producto->cantidad_existencia->EditValue ?>"<?php echo $producto->cantidad_existencia->EditAttributes() ?>>
</span>
<?php echo $producto->cantidad_existencia->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($producto->status_producto->Visible) { // status_producto ?>
	<tr id="r_status_producto">
		<td><span id="elh_producto_status_producto"><?php echo $producto->status_producto->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></span></td>
		<td<?php echo $producto->status_producto->CellAttributes() ?>>
<span id="el_producto_status_producto" class="control-group">
<input type="text" data-field="x_status_producto" name="x_status_producto" id="x_status_producto" size="30" maxlength="200" placeholder="<?php echo ew_HtmlEncode($producto->status_producto->PlaceHolder) ?>" value="<?php echo $producto->status_producto->EditValue ?>"<?php echo $producto->status_producto->EditAttributes() ?>>
</span>
<?php echo $producto->status_producto->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</td></tr></table>
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("EditBtn") ?></button>
</form>
<script type="text/javascript">
fproductoedit.Init();
<?php if (EW_MOBILE_REFLOW && ew_IsMobile()) { ?>
ew_Reflow();
<?php } ?>
</script>
<?php
$producto_edit->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$producto_edit->Page_Terminate();
?>
