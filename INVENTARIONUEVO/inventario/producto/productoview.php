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

$producto_view = NULL; // Initialize page object first

class cproducto_view extends cproducto {

	// Page ID
	var $PageID = 'view';

	// Project ID
	var $ProjectID = "{1C6EAAA4-783D-4754-BFD0-A4DD922C271D}";

	// Table name
	var $TableName = 'producto';

	// Page object name
	var $PageObjName = 'producto_view';

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

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

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
		$KeyUrl = "";
		if (@$_GET["codigo_producto"] <> "") {
			$this->RecKey["codigo_producto"] = $_GET["codigo_producto"];
			$KeyUrl .= "&amp;codigo_producto=" . urlencode($this->RecKey["codigo_producto"]);
		}
		$this->ExportPrintUrl = $this->PageUrl() . "export=print" . $KeyUrl;
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html" . $KeyUrl;
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel" . $KeyUrl;
		$this->ExportWordUrl = $this->PageUrl() . "export=word" . $KeyUrl;
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml" . $KeyUrl;
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv" . $KeyUrl;
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf" . $KeyUrl;

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'producto', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect();

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ewExportOption";

		// Other options
		$this->OtherOptions['action'] = new cListOptions();
		$this->OtherOptions['action']->Tag = "div";
		$this->OtherOptions['action']->TagClassName = "ewActionOption";
		$this->OtherOptions['detail'] = new cListOptions();
		$this->OtherOptions['detail']->Tag = "div";
		$this->OtherOptions['detail']->TagClassName = "ewDetailOption";
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
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
	var $ExportOptions; // Export options
	var $OtherOptions = array(); // Other options
	var $DisplayRecs = 1;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $RecCnt;
	var $RecKey = array();
	var $Recordset;

	//
	// Page main
	//
	function Page_Main() {
		global $Language;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;

		// Set up Breadcrumb
		if ($this->Export == "")
			$this->SetupBreadcrumb();
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["codigo_producto"] <> "") {
				$this->codigo_producto->setQueryStringValue($_GET["codigo_producto"]);
				$this->RecKey["codigo_producto"] = $this->codigo_producto->QueryStringValue;
			} else {
				$sReturnUrl = "productolist.php"; // Return to list
			}

			// Get action
			$this->CurrentAction = "I"; // Display form
			switch ($this->CurrentAction) {
				case "I": // Get a record to display
					if (!$this->LoadRow()) { // Load record based on key
						if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "")
							$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
						$sReturnUrl = "productolist.php"; // No matching record, return to list
					}
			}
		} else {
			$sReturnUrl = "productolist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$this->RowType = EW_ROWTYPE_VIEW;
		$this->ResetAttrs();
		$this->RenderRow();
	}

	// Set up other options
	function SetupOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = &$options["action"];

		// Add
		$item = &$option->Add("add");
		$item->Body = "<a class=\"ewAction ewAdd\" href=\"" . ew_HtmlEncode($this->AddUrl) . "\">" . $Language->Phrase("ViewPageAddLink") . "</a>";
		$item->Visible = ($this->AddUrl <> "");

		// Edit
		$item = &$option->Add("edit");
		$item->Body = "<a class=\"ewAction ewEdit\" href=\"" . ew_HtmlEncode($this->EditUrl) . "\">" . $Language->Phrase("ViewPageEditLink") . "</a>";
		$item->Visible = ($this->EditUrl <> "");

		// Copy
		$item = &$option->Add("copy");
		$item->Body = "<a class=\"ewAction ewCopy\" href=\"" . ew_HtmlEncode($this->CopyUrl) . "\">" . $Language->Phrase("ViewPageCopyLink") . "</a>";
		$item->Visible = ($this->CopyUrl <> "");

		// Delete
		$item = &$option->Add("delete");
		$item->Body = "<a class=\"ewAction ewDelete\" href=\"" . ew_HtmlEncode($this->DeleteUrl) . "\">" . $Language->Phrase("ViewPageDeleteLink") . "</a>";
		$item->Visible = ($this->DeleteUrl <> "");

		// Set up options default
		foreach ($options as &$option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;
			$item = &$option->Add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["detail"]->DropDownButtonPhrase = $Language->Phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->Phrase("ButtonActions");
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
		$this->AddUrl = $this->GetAddUrl();
		$this->EditUrl = $this->GetEditUrl();
		$this->CopyUrl = $this->GetCopyUrl();
		$this->DeleteUrl = $this->GetDeleteUrl();
		$this->ListUrl = $this->GetListUrl();
		$this->SetupOtherOptions();

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
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$Breadcrumb->Add("list", $this->TableVar, "productolist.php", $this->TableVar, TRUE);
		$PageId = "view";
		$Breadcrumb->Add("view", $PageId, ew_CurrentUrl());
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
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($producto_view)) $producto_view = new cproducto_view();

// Page init
$producto_view->Page_Init();

// Page main
$producto_view->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$producto_view->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var producto_view = new ew_Page("producto_view");
producto_view.PageID = "view"; // Page ID
var EW_PAGE_ID = producto_view.PageID; // For backward compatibility

// Form object
var fproductoview = new ew_Form("fproductoview");

// Form_CustomValidate event
fproductoview.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fproductoview.ValidateRequired = true;
<?php } else { ?>
fproductoview.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php $Breadcrumb->Render(); ?>
<div class="ewViewExportOptions">
<?php $producto_view->ExportOptions->Render("body") ?>
<?php if (!$producto_view->ExportOptions->UseDropDownButton) { ?>
</div>
<div class="ewViewOtherOptions">
<?php } ?>
<?php
	foreach ($producto_view->OtherOptions as &$option)
		$option->Render("body");
?>
</div>
<?php $producto_view->ShowPageHeader(); ?>
<?php
$producto_view->ShowMessage();
?>
<form name="fproductoview" id="fproductoview" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="producto">
<table class="ewGrid"><tr><td>
<table id="tbl_productoview" class="table table-bordered table-striped">
<?php if ($producto->codigo_producto->Visible) { // codigo_producto ?>
	<tr id="r_codigo_producto">
		<td><span id="elh_producto_codigo_producto"><?php echo $producto->codigo_producto->FldCaption() ?></span></td>
		<td<?php echo $producto->codigo_producto->CellAttributes() ?>>
<span id="el_producto_codigo_producto" class="control-group">
<span<?php echo $producto->codigo_producto->ViewAttributes() ?>>
<?php echo $producto->codigo_producto->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($producto->codigo_departamento->Visible) { // codigo_departamento ?>
	<tr id="r_codigo_departamento">
		<td><span id="elh_producto_codigo_departamento"><?php echo $producto->codigo_departamento->FldCaption() ?></span></td>
		<td<?php echo $producto->codigo_departamento->CellAttributes() ?>>
<span id="el_producto_codigo_departamento" class="control-group">
<span<?php echo $producto->codigo_departamento->ViewAttributes() ?>>
<?php echo $producto->codigo_departamento->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($producto->nombre_producto->Visible) { // nombre_producto ?>
	<tr id="r_nombre_producto">
		<td><span id="elh_producto_nombre_producto"><?php echo $producto->nombre_producto->FldCaption() ?></span></td>
		<td<?php echo $producto->nombre_producto->CellAttributes() ?>>
<span id="el_producto_nombre_producto" class="control-group">
<span<?php echo $producto->nombre_producto->ViewAttributes() ?>>
<?php echo $producto->nombre_producto->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($producto->stop_min->Visible) { // stop_min ?>
	<tr id="r_stop_min">
		<td><span id="elh_producto_stop_min"><?php echo $producto->stop_min->FldCaption() ?></span></td>
		<td<?php echo $producto->stop_min->CellAttributes() ?>>
<span id="el_producto_stop_min" class="control-group">
<span<?php echo $producto->stop_min->ViewAttributes() ?>>
<?php echo $producto->stop_min->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($producto->stop_max->Visible) { // stop_max ?>
	<tr id="r_stop_max">
		<td><span id="elh_producto_stop_max"><?php echo $producto->stop_max->FldCaption() ?></span></td>
		<td<?php echo $producto->stop_max->CellAttributes() ?>>
<span id="el_producto_stop_max" class="control-group">
<span<?php echo $producto->stop_max->ViewAttributes() ?>>
<?php echo $producto->stop_max->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($producto->cantidad_existencia->Visible) { // cantidad_existencia ?>
	<tr id="r_cantidad_existencia">
		<td><span id="elh_producto_cantidad_existencia"><?php echo $producto->cantidad_existencia->FldCaption() ?></span></td>
		<td<?php echo $producto->cantidad_existencia->CellAttributes() ?>>
<span id="el_producto_cantidad_existencia" class="control-group">
<span<?php echo $producto->cantidad_existencia->ViewAttributes() ?>>
<?php echo $producto->cantidad_existencia->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($producto->status_producto->Visible) { // status_producto ?>
	<tr id="r_status_producto">
		<td><span id="elh_producto_status_producto"><?php echo $producto->status_producto->FldCaption() ?></span></td>
		<td<?php echo $producto->status_producto->CellAttributes() ?>>
<span id="el_producto_status_producto" class="control-group">
<span<?php echo $producto->status_producto->ViewAttributes() ?>>
<?php echo $producto->status_producto->ViewValue ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</td></tr></table>
</form>
<script type="text/javascript">
fproductoview.Init();
</script>
<?php
$producto_view->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$producto_view->Page_Terminate();
?>
