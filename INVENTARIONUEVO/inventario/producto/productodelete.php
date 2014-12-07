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

$producto_delete = NULL; // Initialize page object first

class cproducto_delete extends cproducto {

	// Page ID
	var $PageID = 'delete';

	// Project ID
	var $ProjectID = "{1C6EAAA4-783D-4754-BFD0-A4DD922C271D}";

	// Table name
	var $TableName = 'producto';

	// Page object name
	var $PageObjName = 'producto_delete';

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
			define("EW_PAGE_ID", 'delete', TRUE);

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
			$this->Page_Terminate("productolist.php"); // Prevent SQL injection, return to list

		// Set up filter (SQL WHHERE clause) and get return SQL
		// SQL constructor in producto class, productoinfo.php

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
				$sThisKey .= $row['codigo_producto'];
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
		$Breadcrumb->Add("list", $this->TableVar, "productolist.php", $this->TableVar, TRUE);
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
if (!isset($producto_delete)) $producto_delete = new cproducto_delete();

// Page init
$producto_delete->Page_Init();

// Page main
$producto_delete->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$producto_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var producto_delete = new ew_Page("producto_delete");
producto_delete.PageID = "delete"; // Page ID
var EW_PAGE_ID = producto_delete.PageID; // For backward compatibility

// Form object
var fproductodelete = new ew_Form("fproductodelete");

// Form_CustomValidate event
fproductodelete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fproductodelete.ValidateRequired = true;
<?php } else { ?>
fproductodelete.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php

// Load records for display
if ($producto_delete->Recordset = $producto_delete->LoadRecordset())
	$producto_deleteTotalRecs = $producto_delete->Recordset->RecordCount(); // Get record count
if ($producto_deleteTotalRecs <= 0) { // No record found, exit
	if ($producto_delete->Recordset)
		$producto_delete->Recordset->Close();
	$producto_delete->Page_Terminate("productolist.php"); // Return to list
}
?>
<?php $Breadcrumb->Render(); ?>
<?php $producto_delete->ShowPageHeader(); ?>
<?php
$producto_delete->ShowMessage();
?>
<form name="fproductodelete" id="fproductodelete" class="ewForm form-inline" action="<?php echo ew_CurrentPage() ?>" method="post">
<input type="hidden" name="t" value="producto">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($producto_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($EW_COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo ew_HtmlEncode($keyvalue) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table id="tbl_productodelete" class="ewTable ewTableSeparate">
<?php echo $producto->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
<?php if ($producto->codigo_producto->Visible) { // codigo_producto ?>
		<td><span id="elh_producto_codigo_producto" class="producto_codigo_producto"><?php echo $producto->codigo_producto->FldCaption() ?></span></td>
<?php } ?>
<?php if ($producto->codigo_departamento->Visible) { // codigo_departamento ?>
		<td><span id="elh_producto_codigo_departamento" class="producto_codigo_departamento"><?php echo $producto->codigo_departamento->FldCaption() ?></span></td>
<?php } ?>
<?php if ($producto->nombre_producto->Visible) { // nombre_producto ?>
		<td><span id="elh_producto_nombre_producto" class="producto_nombre_producto"><?php echo $producto->nombre_producto->FldCaption() ?></span></td>
<?php } ?>
<?php if ($producto->stop_min->Visible) { // stop_min ?>
		<td><span id="elh_producto_stop_min" class="producto_stop_min"><?php echo $producto->stop_min->FldCaption() ?></span></td>
<?php } ?>
<?php if ($producto->stop_max->Visible) { // stop_max ?>
		<td><span id="elh_producto_stop_max" class="producto_stop_max"><?php echo $producto->stop_max->FldCaption() ?></span></td>
<?php } ?>
<?php if ($producto->cantidad_existencia->Visible) { // cantidad_existencia ?>
		<td><span id="elh_producto_cantidad_existencia" class="producto_cantidad_existencia"><?php echo $producto->cantidad_existencia->FldCaption() ?></span></td>
<?php } ?>
<?php if ($producto->status_producto->Visible) { // status_producto ?>
		<td><span id="elh_producto_status_producto" class="producto_status_producto"><?php echo $producto->status_producto->FldCaption() ?></span></td>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$producto_delete->RecCnt = 0;
$i = 0;
while (!$producto_delete->Recordset->EOF) {
	$producto_delete->RecCnt++;
	$producto_delete->RowCnt++;

	// Set row properties
	$producto->ResetAttrs();
	$producto->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$producto_delete->LoadRowValues($producto_delete->Recordset);

	// Render row
	$producto_delete->RenderRow();
?>
	<tr<?php echo $producto->RowAttributes() ?>>
<?php if ($producto->codigo_producto->Visible) { // codigo_producto ?>
		<td<?php echo $producto->codigo_producto->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_codigo_producto" class="control-group producto_codigo_producto">
<span<?php echo $producto->codigo_producto->ViewAttributes() ?>>
<?php echo $producto->codigo_producto->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($producto->codigo_departamento->Visible) { // codigo_departamento ?>
		<td<?php echo $producto->codigo_departamento->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_codigo_departamento" class="control-group producto_codigo_departamento">
<span<?php echo $producto->codigo_departamento->ViewAttributes() ?>>
<?php echo $producto->codigo_departamento->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($producto->nombre_producto->Visible) { // nombre_producto ?>
		<td<?php echo $producto->nombre_producto->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_nombre_producto" class="control-group producto_nombre_producto">
<span<?php echo $producto->nombre_producto->ViewAttributes() ?>>
<?php echo $producto->nombre_producto->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($producto->stop_min->Visible) { // stop_min ?>
		<td<?php echo $producto->stop_min->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_stop_min" class="control-group producto_stop_min">
<span<?php echo $producto->stop_min->ViewAttributes() ?>>
<?php echo $producto->stop_min->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($producto->stop_max->Visible) { // stop_max ?>
		<td<?php echo $producto->stop_max->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_stop_max" class="control-group producto_stop_max">
<span<?php echo $producto->stop_max->ViewAttributes() ?>>
<?php echo $producto->stop_max->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($producto->cantidad_existencia->Visible) { // cantidad_existencia ?>
		<td<?php echo $producto->cantidad_existencia->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_cantidad_existencia" class="control-group producto_cantidad_existencia">
<span<?php echo $producto->cantidad_existencia->ViewAttributes() ?>>
<?php echo $producto->cantidad_existencia->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($producto->status_producto->Visible) { // status_producto ?>
		<td<?php echo $producto->status_producto->CellAttributes() ?>>
<span id="el<?php echo $producto_delete->RowCnt ?>_producto_status_producto" class="control-group producto_status_producto">
<span<?php echo $producto->status_producto->ViewAttributes() ?>>
<?php echo $producto->status_producto->ListViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$producto_delete->Recordset->MoveNext();
}
$producto_delete->Recordset->Close();
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
fproductodelete.Init();
</script>
<?php
$producto_delete->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$producto_delete->Page_Terminate();
?>
