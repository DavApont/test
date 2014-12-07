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

$proveedor_delete = NULL; // Initialize page object first

class cproveedor_delete extends cproveedor {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = "{1C6EAAA4-783D-4754-BFD0-A4DD922C271D}";

	// Table name
	var $TableName = 'proveedor';

	// Page object name
	var $PageObjName = 'proveedor_delete';

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
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $TotalRecs = 0;
	var $RecCnt;
	var $RecKeys = array();
	var $Recordset;
	var $StartRowCnt = 1;
	var $RowCnt = 0;

	//
	// Page main
	//
	function Page_Main() {
		global $Language;

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->GetRecordKeys(); // Load record keys
		$sFilter = $this->GetKeyFilter();
		if ($sFilter == "")
			$this->Page_Terminate("proveedorlist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in proveedor class, proveedorinfo.php

		$this->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$this->CurrentAction = $_POST["a_delete"];
		} else {
			$this->CurrentAction = "I"; // Display record
		}
		switch ($this->CurrentAction) {
			case "D": // Delete
				$this->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // Delete rows
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("DeleteSuccess")); // Set up success message
					$this->Page_Terminate($this->getReturnUrl()); // Return to caller
				}
		}
	}

// No functions
	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn;

		// Call Recordset Selecting event
		$this->Recordset_Selecting($this->CurrentFilter);

		// Load List page SQL
		$sSql = $this->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	//
	// Delete records based on current filter
	//
	function DeleteRows() {
		global $conn, $Language, $Security;
		$DeleteRows = TRUE;
		$sSql = $this->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
			$rs->Close();
			return FALSE;

		//} else {
		//	$this->LoadRowValues($rs); // Load row values

		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs)
			$rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $this->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= $GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"];
				$sThisKey .= $row['rif'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $this->Delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("DeleteCancelled"));
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call Row Deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}
		return $DeleteRows;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$Breadcrumb->Add("list", $this->TableVar, "proveedorlist.php", $this->TableVar, TRUE);
		$PageId = "delete";
		$Breadcrumb->Add("delete", $PageId, ew_CurrentUrl());
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
if (!isset($proveedor_delete)) $proveedor_delete = new cproveedor_delete();

// Page init
$proveedor_delete->Page_Init();

// Page main
$proveedor_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$proveedor_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var proveedor_delete = new ew_Page("proveedor_delete");
proveedor_delete.PageID = "delete"; // Page ID
var EW_PAGE_ID = proveedor_delete.PageID; // For backward compatibility

// Form object
var fproveedordelete = new ew_Form("fproveedordelete");

// Form_CustomValidate event
fproveedordelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fproveedordelete.ValidateRequired = true;
<?php } else { ?>
fproveedordelete.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php

// Load records for display
if ($proveedor_delete->Recordset = $proveedor_delete->LoadRecordset())
	$proveedor_deleteTotalRecs = $proveedor_delete->Recordset->RecordCount(); // Get record count
if ($proveedor_deleteTotalRecs <= 0) { // No record found, exit
	if ($proveedor_delete->Recordset)
		$proveedor_delete->Recordset->Close();
	$proveedor_delete->Page_Terminate("proveedorlist.php"); // Return to list
}
?>
<?php $Breadcrumb->Render(); ?>
<?php $proveedor_delete->ShowPageHeader(); ?>
<?php
$proveedor_delete->ShowMessage();
?>
<form name="fproveedordelete" id="fproveedordelete" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="proveedor">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($proveedor_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table id="tbl_proveedordelete" class="ewTable ewTableSeparate">
<?php echo $proveedor->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
<?php if ($proveedor->rif->Visible) { // rif ?>
		<td><span id="elh_proveedor_rif" class="proveedor_rif"><?php echo $proveedor->rif->FldCaption() ?></span></td>
<?php } ?>
<?php if ($proveedor->direccion->Visible) { // direccion ?>
		<td><span id="elh_proveedor_direccion" class="proveedor_direccion"><?php echo $proveedor->direccion->FldCaption() ?></span></td>
<?php } ?>
<?php if ($proveedor->telefono->Visible) { // telefono ?>
		<td><span id="elh_proveedor_telefono" class="proveedor_telefono"><?php echo $proveedor->telefono->FldCaption() ?></span></td>
<?php } ?>
<?php if ($proveedor->razon_social->Visible) { // razon_social ?>
		<td><span id="elh_proveedor_razon_social" class="proveedor_razon_social"><?php echo $proveedor->razon_social->FldCaption() ?></span></td>
<?php } ?>
<?php if ($proveedor->persona_contacto->Visible) { // persona_contacto ?>
		<td><span id="elh_proveedor_persona_contacto" class="proveedor_persona_contacto"><?php echo $proveedor->persona_contacto->FldCaption() ?></span></td>
<?php } ?>
<?php if ($proveedor->status_proveedor->Visible) { // status_proveedor ?>
		<td><span id="elh_proveedor_status_proveedor" class="proveedor_status_proveedor"><?php echo $proveedor->status_proveedor->FldCaption() ?></span></td>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$proveedor_delete->RecCnt = 0;
$i = 0;
while (!$proveedor_delete->Recordset->EOF) {
	$proveedor_delete->RecCnt++;
	$proveedor_delete->RowCnt++;

	// Set row properties
	$proveedor->ResetAttrs();
	$proveedor->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$proveedor_delete->LoadRowValues($proveedor_delete->Recordset);

	// Render row
	$proveedor_delete->RenderRow();
?>
	<tr<?php echo $proveedor->RowAttributes() ?>>
<?php if ($proveedor->rif->Visible) { // rif ?>
		<td<?php echo $proveedor->rif->CellAttributes() ?>>
<span id="el<?php echo $proveedor_delete->RowCnt ?>_proveedor_rif" class="control-group proveedor_rif">
<span<?php echo $proveedor->rif->ViewAttributes() ?>>
<?php echo $proveedor->rif->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($proveedor->direccion->Visible) { // direccion ?>
		<td<?php echo $proveedor->direccion->CellAttributes() ?>>
<span id="el<?php echo $proveedor_delete->RowCnt ?>_proveedor_direccion" class="control-group proveedor_direccion">
<span<?php echo $proveedor->direccion->ViewAttributes() ?>>
<?php echo $proveedor->direccion->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($proveedor->telefono->Visible) { // telefono ?>
		<td<?php echo $proveedor->telefono->CellAttributes() ?>>
<span id="el<?php echo $proveedor_delete->RowCnt ?>_proveedor_telefono" class="control-group proveedor_telefono">
<span<?php echo $proveedor->telefono->ViewAttributes() ?>>
<?php echo $proveedor->telefono->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($proveedor->razon_social->Visible) { // razon_social ?>
		<td<?php echo $proveedor->razon_social->CellAttributes() ?>>
<span id="el<?php echo $proveedor_delete->RowCnt ?>_proveedor_razon_social" class="control-group proveedor_razon_social">
<span<?php echo $proveedor->razon_social->ViewAttributes() ?>>
<?php echo $proveedor->razon_social->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($proveedor->persona_contacto->Visible) { // persona_contacto ?>
		<td<?php echo $proveedor->persona_contacto->CellAttributes() ?>>
<span id="el<?php echo $proveedor_delete->RowCnt ?>_proveedor_persona_contacto" class="control-group proveedor_persona_contacto">
<span<?php echo $proveedor->persona_contacto->ViewAttributes() ?>>
<?php echo $proveedor->persona_contacto->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($proveedor->status_proveedor->Visible) { // status_proveedor ?>
		<td<?php echo $proveedor->status_proveedor->CellAttributes() ?>>
<span id="el<?php echo $proveedor_delete->RowCnt ?>_proveedor_status_proveedor" class="control-group proveedor_status_proveedor">
<span<?php echo $proveedor->status_proveedor->ViewAttributes() ?>>
<?php echo $proveedor->status_proveedor->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$proveedor_delete->Recordset->MoveNext();
}
$proveedor_delete->Recordset->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<div class="btn-group ewButtonGroup">
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
</div>
</form>
<script type="text/javascript">
fproveedordelete.Init();
</script>
<?php
$proveedor_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$proveedor_delete->Page_Terminate();
?>
