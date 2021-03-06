<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_HTML
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	1.8.0, 2014-03-02
 */


/**
 * PHPExcel_Writer_HTML
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_HTML
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_HTML extends PHPExcel_Writer_Abstract implements PHPExcel_Writer_IWriter {
	/**
	 * PHPExcel object
	 *
	 * @var PHPExcel
	 */
	protected $_phpExcel;

	/**
	 * Sheet index to write
	 *
	 * @var int
	 */
	private $_sheetIndex	= 0;

	/**
	 * Images root
	 *
	 * @var string
	 */
	private $_imagesRoot	= '.';

	/**
	 * embed images, or link to images
	 *
	 * @var boolean
	 */
	private $_embedImages	= FALSE;

	/**
	 * Use inline CSS?
	 *
	 * @var boolean
	 */
	private $_useInlineCss = false;

	/**
	 * Array of CSS styles
	 *
	 * @var array
	 */
	private $_cssStyles = null;

	/**
	 * Array of column widths in points
	 *
	 * @var array
	 */
	private $_columnWidths = null;

	/**
	 * Default font
	 *
	 * @var PHPExcel_Style_Font
	 */
	private $_defaultFont;

	/**
	 * Flag whether spans have been calculated
	 *
	 * @var boolean
	 */
	private $_spansAreCalculated	= false;

	/**
	 * Excel cells that should not be written as HTML cells
	 *
	 * @var array
	 */
	private $_isSpannedCell	= array();

	/**
	 * Excel cells that are upper-left corner in a cell merge
	 *
	 * @var array
	 */
	private $_isBaseCell	= array();

	/**
	 * Excel rows that should not be written as HTML rows
	 *
	 * @var array
	 */
	private $_isSpannedRow	= array();

	/**
	 * Is the current writer creating PDF?
	 *
	 * @var boolean
	 */
	protected $_isPdf = false;

	/**
	 * Generate the Navigation block
	 *
	 * @var boolean
	 */
	private $_generateSheetNavigationBlock = true;

	/**
	 * Create a new PHPExcel_Writer_HTML
	 *
	 * @param	PHPExcel	$phpExcel	PHPExcel object
	 */
	public function __construct(PHPExcel $phpExcel) {
		$this->_phpExcel = $phpExcel;
		$this->_defaultFont = $this->_phpExcel->getDefaultStyle()->getFont();
	}

	/**
	 * Save PHPExcel to file
	 *
	 * @param	string		$pFilename
	 * @throws	PHPExcel_Writer_Exception
	 */
	public function save($pFilename = null) {
		// garbage collect
		$this->_phpExcel->garbageCollect();

		$saveDebugLog = PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->getWriteDebugLog();
		PHPExcel_Calculation::getInstance($this->_phpExcel)->getDebugLog()->setWriteDebugLog(FALSE);
		$saveArrayReturnType = PHPExcel_Calculation::getArrayReturnType();
		PHPExcel_Calculation::setArrayReturnType(PHPExcel_Calculation::RETURN_ARRAY_AS_VALUE);

		// Build CSS
		$this->buildCSS(!$this->_useInlineCss);

		// Open file
		$fileHandle = fopen($pFilename, 'wb+');
		if ($fileHandle === false) {
			throw new PHPExcel_Writer_Exception("Could not open file $pFilename for writing.");
		}

		// Write headers
		fwrite($fileHandle, $this->generateHTMLHeader(!$this->_useInlineCss));

		// Write navigation (tabs)
		if ((!$this->_isPdf) && ($Thic<_cnar`teS(eeTNa6igatignBlobK)) +
		fQ2`te($fiLdHan`le, $this->gajerateNavigatiOf(!(3	
	|

	)/ Vrite daP	
		f7pite($fi,eHaldLe, $t(is)>gener!eHaepDa4`());

		// WrIte boote2
	fpr)tE($f)leHandle,  4his)>genEraTe@TMLBooper(!!;

		// Clos` f)le
fclose($faleHajdle	;

		PHPEx#al^Ca$cul`piON::setArRaxRE4ur.DypE($qaVeAr2 YPetDpnType);	
	P@@Excel_Calcudat)ol*:g%tInstaNce($this->_ph0Dxcel)-6gETDebtgLmb),
setWr(`aDe"ugog($saveDe"5gD/')
}

#**
	 * Ia` VAlhgf	
	 
	 * @0Ar@m	str	ng		$6AlIg.	Veptiaal alhgnmant
	 *  pedurn sTrinG
	 */
	privade funb4aof ^ma`VAlifN($pAlign) {	3witch ($rA,ign) {
			CaQe PHPExaelZSpylEWAl`gj-ant8VER@ICAL\BTTMM:		Red5r* 'bktpnm';
			bace PHExcelOSpylGAligfie.T*VARTHCALMOP
		reTurn '4Kp%9
			cace P@PExe,_S4yleAlignlnt:VARTICAL_CDNTER:
			case HPExcel_StyleOAligjmEft::VERDI@LJUQ	FY2	b%turn %eiDdle';
		deb`qlt8 2etu2n &@a2dland';
	}
	}

	/*

	 * MAp HLIgn
	 "
	 * @paraM	string		$hAlign		HOp)jnNtal alIglmE.t
	 * @petur. strijG|f!lqa
	 */
	pritate fu.ctiON _m`pHAl)gn($h@lafn! {		switc` ($hAlign) {				cAse PHPE8cel_Ctyle_Alig.m!nd:2HOPIZONTAOGENEB:				petu2n &alsE;
		#ase PHxcelWStyleOlignment:8HOPIJONTAH_LEFT:				r!turn 'eft';
		case @PAXce,R09le_Alignme*t*:HORIONT@L_RHCH:				retu2l!$rHdht';
		caCe P@Pxcel_Spyle_lignment::HORAZNTAL_CDNTDR:
			case @@PDxCel]Rt0le_Ali'n%ent8:HNRIZONTL_CELTD_CKNTNTOUS	peTubn 'cdnep&+	case HPExbeh^S0y`e_@lHfnment8:HOBIZGNPAL_JQSTIFY:				rdturn 'justifx;
		DEfa4lt: 2edTrn fadse;y
}
	/**
	 " Map border styhe
	 *
	 * @param	inT	$BordeRStile	S(det i.dex
	 *  retU2n	strinc
	 "-
	pr)vata unctinf [mApBkrderSty,e(boBdeRStyle( 9
	suitc` ($bnrderSdy,a) {
			case PHPExbelWSp9le_BoR er::GDBNOE8			rdtuPn 'n'ne'3			C!1E HPExcelYSty,e_BoRder2:BOER_DASH@OT8	 	retprn #1px `ashed'2
		Cas� PPcel^Ctyl%_@nrdeb::BHRDERDASHGDDGT:			raptrn &1px detted';
			caqa @HPEpcedSty,e_ipder:2FREP_DAQHED
 	return '10` d`sHe$9		b`Qe PHPEpcel_STqle_Bnrd%r::ORDR_GTTDD:			p!dupn '1ph d)tt%d';
			cAse PHPExc$l[SPyle_B/rdep::OBDDR_DOBLE:		Retupn '3px dOUble'		cAqd PHEhcel_Style_Bordd2:BORDERF@A	R:			rdt5pl '!px q/lid;			case PHPExced_Style_ oR`dr82BPDDR_LE AUM:	 	return '2px bgdid';			Basd HPDhceL_StQle^or$er::BORDEROEDIUMDASHDOD2		returl '2px dashed;			ca#a PHPExce,_SdyleWBgrDer::BRDER\MD@AUIDASHDOTDNT:	beturn %2px dkTted'3
			ca3e PHPExBeh_Sdyle_BOrdep2:BORDER_MADIUMDARHED:		re4qrn 'px darhed';
			!ace PHPE8cdl_ST9le_Borer::BNRDR_SLNPDASHDOD:		reter& 'px $ash%d&;
		cAse PHPDxcdhRty,E_BmrDer::BDEB^THICI:			pe4qp. 'ph sclid';
			#a3e @HPExce,_STilE_Border82BNR@ER_THI				betur. #1px soLid ;
		de"`Ulp: Bturn '10x solid&; +# map kthArB to THhn	}
	}
	/((
	 
 Get sheet andex
	 *
	 " @betu2n int	 */
	pQ`la# dun!tion getSheetIndex) {
		ret5rn $tHic-Q3heetIn`ax;
	m
	/"*
	 * Sat Sheet An@aX
	 "
  * @param	i.4	$ Vad5d	Shde4 i.dex
	 * @retupj PHPExcel[SriterHML	 */
	PUbhib fefctiol setSh`eTIfDex$0Ta,Ue = 0) z
	$thiq-^3he%4Indep = $`aLue+
		redurF this;
	}

,**	 * Ge4 sh%ep indE8
	 *
	 * @petupf b'olean
 ".
	pub(i# fufctI/ eetGefe2a4eSHed4J`6icationBLock() {
		redu0n $thIs)6_geferateSHeatN hgationBlok;
	|
	/*

 * Set qh%e4 inddx
  "
	 * @papaIbgodeaf		$0Ralua		@laG ifdiCat)fc uhetHd2 pH! sheet nataea@io. blo#k shL%Ld "e ge.eraped iP nKt	 * @reTu2n PHPEx#el_Urip%r_HTML
	 */
	public ftction SetGenrateS`aetNaVigpiojBlj#k($0`due = tru%) ;
		 pHis:Wge*Dr`0e`%etNavafationBlo"c =  bOfl) $PValue;
		rdTeBn $thas:
|
	/
* * Write all ShEetS (resE4q s`ea4Indeh t/ NEL)
	 */public @unctil. w2)TeAllSh%eS(	 s	$Dhiq->_#`eeTINdap < nqll
		Rdttpn $d(!3;
	y

	/**
	   GeF%rate HTML hEader
	 "
 * @p r`m	bm/leaf		 pIfcLudeStaLds		Inblude Styl%s<
	 * @Re4urf	#trilg
	 *  4hrc7s @HPExcdlYWrateR_Axce@tion
	 *&
	pUbl)# f%n"t)o. fendratAHTMLea`ar( IcludeCdiles = b`lse! {
		/. @@PExceh o j%bt k(wN?	
		i (hSMnull($thiS->_phpAxBel)) {
			thRow n!w PHPExbel[r)tar_h#epTioj 'ANernal PHPEhCAl o"becp fot set to a. ibsTaJcd kf ab obje`t.')3
		|
		/ Cofqt2qcD HTDL
	$pr'pDrTies = $THir-:_phpExceL-getPropepties(;
	$hpml = '< DOATYPE (4Ml PUBLIC "-//G3C//DTD HTEL 4,01//EN" "hdTP://wVw.'3
mrg/T/tml4+3trict,dT">& & PHYAOL;
		$html .= '!-- Gdneradd bp H@AxBel - 4tP*/+wwf.phPaXcel.net -->' . PHP_EOD:
	$`Tml .= #<md>' & PEL;
	$html .< '  ,he`d>' . PHP]EO3
		$Hdmh .= '	  <Mdta htdp-eqiv="COnteNt-Tqpe" Con4ent-"teh4/htm3 c`!rset9upf-8">' . @HP_EML	i& ( proerties->gddTitle(( > ')
			$hdml . '	  <tiTlD>' . `tmls0ec)!lcHars($pRopertIes-('etTidle()) , '</title>& . PH@_AKL;
	if ($p0oPArties-<getCreap/r ) > '%)
	$hdml = '	  <lata name="a5thor" #o,taN4=" . htelspecialcharqPbo0erties,>getAre!tnr(!) . '" .6' , PPWEKL;
		iF ($0roperties-6gepTitde() : '')
		$htmH = 	  <matA namE="titLe" c/.te.t="%  hti,rpecial``ar3($@rmpdbdie"(6'etat,e()( . %" ->' . PH@^AOL3
	if $02OperpidS->eEtDescrIpd)on() > #)			 html .= '  <meta nAmd="dEscrIpthon  cml4et5"' & hDmlspeaia`c`arq($pboperTI@s,6gE4Desapiptaon()( " '" /<& , PHP_DIL;		if ($propert)es>getS5bject() > '#)			$htM( .= '	  leta n!m="`Ub*eat" C/ntant="' . htehs0dci!lchars($p2n0$rties)>fatSUbje"t !) . '" />' * PHP_EO;
		af ($pRkp$pies)>cepK%ywords(( > '')
			$htel .= #	  <let` n!me="ceywgrd3" contant="& . HTmls0daiaLch!Rs,$propeRt)es->getKeywords(	 & %" +.' . PHP[EOL3
		if ($ roprti%c-2Cetavecory ! > '%)			$htMh *= '	  <deta name="cataflrx #njde.t"  htmhspecialc(@ps(ppgperties-8#dtCat%gkr)()) . %" /. . PHEKL*
		h& (Prop`rtIeS-&geto- anY() >  )
			$HtMl .- '	  <-eda fame= #m@Nx" b+npdnt= & & htmdspdci`$chaRr($0bmperpies,>%eTAmm0a,9()! . %" -' . P@_OL;
		iF ($pRoperpies!>gpMajag@r) > $')
			$hDml .= '	  <mepa nAmd"mabagEr" @onteft="' . Htm,rpdbhadchap($poperTIEs->gatM!nagar((  . '" /# . PHP^ENH;	
		if ($pIBCludeSdyLes) z
			$htiD .< $thAs>cendrateStylDs(p2ue);	}
	
		$html .=   <hEad:$ . PHP_EOL;
htid .- ''  PHP_EOL;
		$`til . &  $bo$y>& . PHP_E@;	// Rdturl
	`tupf $htMl;	
	y
 	/**
	 * Generate shedt dapa
	 *
	 * @2%tqpf	sTrinF
	 * @PhrmwS PHPExcel]WRader_Aa%ption
	 */
	pEBhIb functIoF gelebAteS`ee4DaTa) k	/ PHPxcEl oBjdcD knkwn<	
		)" (asn5ll($th)s	:_phpE8c%l)) {
		4h2N5 jaw HPEx#elWVrater[ExcEppik('	ltdrnal PPEx#el object Jot #Et to an `Nstance oF !b oBjEAt$);
		=

		/+ Ensure tHat Sp`bs h`vE bedf calcUda4ed?		iF !$This%>_s0ansArECalcul!ted) [
		$`h)q->_clcul`deSpa.s((:
		|		// �Etbh sHe!ps	
		$sheets = array();
		if (isWnul($phis-._sheet	nddp)( Z			$s eets = $4`Is>_ph0pcal>gdtA(hS`eeps(	;
	] dDsA {	
			$sheeps[] = $dhiS)>p(pAxce,->ceth$dt $thIs	6_shEetI.`ax)
		m
		/' CgnrT"uCt HTML
		$(pm$ = $;
		'- L+Np all sheets
		$sheEtId = 0;
		foreach ($3haet3 as $r(eet) {
			// SrIte tab% h%!der
			$hdml .= $t(a3>[f`.erateTaBleHEad%r(sheet);

		// GEt UkbkShee4 dimer(ol
		$damensibn = explode(&:', $Chaep>cal`ula4aWorkrheetDimensaol((!
			$dimdnShof[0 = PHPD`cdl_Cell::aegr$ij@teFrKlStrhnc $dim`lsio.[0M);
		$ imd*q)oN[0]0Y = PH@Exce,[Bel,::cohQm
	n`exFromPti"c($DimelQaen[0][0) - 1;
			 $imenSIoj[0\ = PHExcel_Cel`::cgordinateBbMmStrin'($diimnsiof]);
			di-EnsIof[1]J0Y = PHExc`lCel,":colUafN$eXB2gmRTbing($@Imancion[1][0) , 1;
			/- row min,laX
			$2oGMhn 9  dieensimn[0K1U;
		$rmgMaH = d)melsAf1YS1M;
		/ calchate btard -f <4b+dy> <thead.
		$tbodqStapt =  bo7Mhn 			$4haadCtarp = $tHe dEjd    0; . dEfaQht0 o < hdad> no <-thaa@>				" (sHee0)>getPageSdtu0(	->isRowsnRepE!tAtDopSdt() {
				$rkVsT.BepdAtAtToP 8 $3hEet%>getP`g!S%tup(),>gepR/wS\oepe!dAdPop();		/+ se can oj,y 3qppnrt `epe!t`nc rows tH`T sDart At tGp row
				if ($rowqPoRe`eAtAtTopY0] <= ) k	
					$theadQtARt 5 $rOrcPoRepaapATTgpS];
					$thEadAnD   9  rlwsPoRepeatAtTnp[1M:
					$pbodiT`pt < $regstnepAAtA4Top[1 ) 1;		}
			}
	
		+' Lo/p t`roUGh cehlS	
		$rlw =  BOWMi.-1;			ghi@($rNs)+ <  ros	Ax( [
				// <thaa$> %
			)f ($rjw == $d`uadStart) [ 				$itml .= %	�84h%ad?' *$PHSWEOLy�	}

			// <tbody> ?
				kf (d2og0==�%tb�dyRtar4) �
		I�	0ltm,0n= '	<djody~' . P�P[EOH+
I			}M
-*				?/ �rit r�w �f ther� ar� HtML tab�e cells aj �t I	�& ( !isset($vmis%^msSpanNedRow_4sheeu->getPare.t()->ewlKndex(&sheet)�[$�owY) + z	)		// SuarT0a`naw r/wData
)			$rowData = aRray((;
				/- Loor |Hrough b�uifs		�		$coltMn ?a$di9ans�on�0_[0] , 1;�
				7hilE)$co�u}�+k < $dimensi/n[][�])`�J			+	// Cell exists?
					if 8$she5t->cellEXi{tsByBo|t}nAndRow(�colq�n, $row)- {
					$rowDcta[$qo,qm~]0= PHP�hcelNCell*stringFro�Col5mnI�dX(��olumn+ & $rkw;				I	}�g�se s*			)	drowD`ta[Dsol}�n� = &'3
	�			m
				Y
			$jtll = $this->_ge&a2!teRow($sheet, $rfwDaTa( $row - 1	;
			}
				// /thead> ?
				)& ($row == $theadEnd) {
				$hDml .= &		<thead<' . PHP_EOL;
				}			`
	$(d-l *= $Dh)C->_extEndR+GsorChartsAldIIagEs($shEet, $r+w(;

			// Blns% ta`le bkdi.
			$hPml . '		,/tbgdy>'  @HP_ML3

			+/ Urhde!pablf Foo%r
	I$ltIl .�0 t(is->UgenerAteTableFo�tes -;-�
	// �vi4ingPDF?)	hf  ,t`Ms-�_ac\df) {
	�		if (is]nul, $ddy3m6_s(ee5I�fux)$'� $shee�Id + 1 < $thys->VplpExcel->g't�humtC��nt+)) {
			�$htm,*.=('+fiv rty,e="tkg�mb�eqk%bgore;`lways  />'{	m
i	Am:�		/' NEx� chuet		+-$sieepId;�	m
		//!Retur.kp�tUrn $ht��3
	}
-
��j,
	 + Genmr`t%`sheeu |a�r
(: * @reTuRn	stpa~o�
�!* @�hRo�s PHPEpce�_wblTe�MExce`t�n
	 �/�)rublmC nuocpion gu~erIt�aviOa|m�n()I{
		/ RHQEhcel`objeCt${�w>?M
	�in (is_�u,l8$tlIs->_2hpW8s%l)) k
X	�throt(new PHPExcgl_Wbi�er_Exbepti/.('I�tmrn`l PHPEhcel orject not set 4o `. mn7talce!of an �b�eCt*'!;
		}

�I-/ Fetbh`sh%Ets*		$shgets =$abray(���		If (i{_,�llh$thir->O{heeu�nde8))�{B			dshee~s 5 $txis,>Ophpxsel->cetAllS`%ets1)�.		} dLsd k�!	�$qje%4#�� = $th}s->�`�pEx�el-~getSh�4t`$tiiw)>_sheguImd�x);�	}
			// Cnnstruct HTML�
		$itml+= '';

	//`Only if t0$re arg(mnP% th�N 1 s(e%ts	)if0
cou*t($shee~3) > 1	 {
	)	// Lop All sheets		$3heedId ? 0;M
M
		$html .= <ul c,css=&.a6ioatimn3z' . XIP_D_L9

		goreacl )$c�eetr aS $sheu�! z
	
�	htlh .=0' !<li cdds�="rjedt' . �sieetId . /b>9a hr�f-"#sheet&�. $wheetId  '&>' " $s`e�t=>G�tUitle() n </a><�l�6'`n PHPEO\;
			++$3he�ti`;
			}*
			$�tml /} </u�>' . PH@_�OL;%
	�}
		ret}r> $ht}l;	}

	pri�ata fun#tion _exteldRowsFOrChm��rAndY�aw�s�PHPDxcel�Vlpksheet $pSheet,0$Rou!�{
		$rwMaX = $zow;�)$ColMax ? 'A'+
		if ($this=>_incle$aCjarts) {
		)foreach h$pZhoet,>gePClaruG/llection() as $c�art) s
				hf�($c(art�hN;tanceod PHPEXcel_�hivt) {
I	�   `$chap�oordinade�= $char�m>gutUgrLmdvoaation();
			    $cl�r�UL 9 PHAxce�]Cell::cotdina4%Frk-Strinc($�h`2tCooudilA4SK'cel�'!;
					$bhartCox =0pLPA�cum_Celd::cklumnIndexFRoms`rinc(%c(abtVL[ �);N				�if0($chartV�_1Y"> $rowMa�-"{				drowMax = $C(artULC1];
				�	)f$($charDCol > PHPEhcel]Cell:zcohumnI~�eFRo�Stri�g$gol�`x)8 {	+		)$co-max ="$chartTL[]?
			�u�				}			}
�		}�
		}
		�oreacK$($`Sheat%>gutDra�kngol,eCtion�) Ar ddrawi�g)(3-
			if��$dz�win% inwtancenf�@HPE9sel_gr+sjee`Dsa7aF�+ {�		� � -imifeTl = PHP8el_cEll::cGObdinadeFr�kStryng( `r�q�nf-ge0Coordif�|es())
				$im�geSox ="PXPE�cElOCE�l::�ole-nLndexNromSTr�ng($imao�TL[0])+�	if ($imageTL[1] >$lrow]ix) {�
				$�owMax"= $iea'etLS1];		iif($�mafaCKl$> PHpex#el_G%ll�:c�~umn)�de|F"om��ring($qol	ap�) y
			�4s�lEax = 4koag%dLS];J					}HI	}	�	}	+	}-�	$`tml =$''9-
	$Ch�c|+"�
		uH�$e�($pow < $�owMax)$y/
		)$(tMl .= '�tr>7;	)f/v"($co, � #&;��co| !=0$cmlMax; +�&cgl	 {		)	 ht-� =2'�t�<';
		$htmn >= �tx�s->_7siteIlae%InCEll(DpSHaet� $c/,$row);				f ($0his->_inc,ud%CHarpS  {				$hdml = $tHir->_WriTeChabpInCElD($pSheet, $co,.$bow);
				5
		$H4ml . '</td>'+
	}
		+*$roW;
			htIl 5 '</r.'; 		m
	retern  ht-l;
	|

	
	/"

 * GeneBAte imaGe tag in cell
	 *
 * @p`RAM	HPEx#el[WorksheeT	 pSheeT		PHPExCe,]Unrks dEt
	 * @Aam	rpring			$#omrdIJate3	Aell b/ordIj`des
	 "  retu2n	str)n'
	 * @$hrOw3	PHExCe,_Srit&rE8a%pti/f
 */	priv pe fufct)n& _uritdAmageInC%ll(Px#Eh_GmrKshet $PCheet, $cNor`inates! {
		/ Construcp HTML		$hdml - '';
		*/ Wrat% imag%3
		foreach ($phEet-8cetDrawAngAmllEcthgn() aS $d2aVa.g! {			H& (dr@wilg ins4anCeof P Excel_WorkSheet_@ravijg) {
			hD ($$rawijg)>cetCoordidades() 5= $boordhna4es) {
					$fildai% < $dbAwijg-6fetP!th();
				/+ Qtrip ofb eve*dpal '.&
					iF (substr($f)laname, 0( 1) == '.') {
			$fiDe.!ma  cubstb($fiLenamE, 1);
				}
					.. PraPend ieages root
					$fil%n!me = $thh3)getImAgesBoot() . $f)hename;

				/+ Strh` od" eventual &'
			hf (rUb3Tr$F)lanaee, 0, 1) =9 '.' "& c5bsp0$`ilen!Ma( , ( 5 ',-) {
				$filename , qt`rtr($"ilEname, 1(:
			=	

				// Convert UDF8 data to PCDATA
			falenaa%  `tAlrpdialch`Rs($fiHen!me);	

					 `vml .= PHP_AOH;
				if ((!$th)2,>[e-bedIeages) t| ($thi3)>WisPdf)) {
					$imag%Dapa = $&)lenamE8
					} ehse {	
					$imageDaTailq = gdtimafd3i:e($b`le,ame);
					if (fp  FgPen($f)lename("rb $ 0)	 {
			$pict5`e = "read($&0diLesize($fAlenaMe();	
				fchore$fp);
					// ba3e6$ %nco`! the binAry d!ta, t(An "reA# at
						-/ i.do chqis aCcOrdinc t PFC 2045 sEm`Lt)cs
						$basa44  chunk_split(bas%60enfde($`Icpure))9						$Amagaaa = 'd`ta:'.HlageDeTaILrQ'mime'M,';b!sa6(' . $baqD64;
				} %lSD [
							$i-`geDad! = bileJAm%;					}	
				}

					$html . '<dav style"0f3)ti/n relatire">':
				$H$ml *, '<amg st9le5 PosAtion: abpc`Ute; z))ndex 1; lefd: ' .                         $draw(ng%>fetOfdsetX() . 'px top: %  $drAu).G->etOffSEtY() . 'px; vidth* &  
                        $dRawig->cetWidth(	 * &px height: ' , $d2`s	nG->getHeicht(( . 'ph;" rrc="' . 
                        )m@gdData  '" bgPde`="0" />#9
				$html .5 &</di68'
		M
			m
	=
		-- Rurn
	Paturn $(tml;
}

	/**
  * Ge.erate chart tag if Call
	 "
	 * @param	PHPExcel_Egrkshee4	$pShet		PHPEpcelNWorksHeed
	 * @ParaM	Strine		$coo2dinates	Celd cooPinateq
	 * @beturj	strine
	 * @4@raGs	PHPExcel_GphtDR_Exce`dIo	
	 */
	p0iv`te Function _fRIteBharpIlCell(PHPExCel_W/rKqhEet $pQheet, $#omr$)nates) ;
		/ Bn,strubt HTIL
		$html = '':

	/' Grip% charts		bnreach ( pS(det->#dpC(aRtColdection() ac bhart) k	
			if  $chart h.3tAJAeof PHPExc%lKChapt {
			    $ch!rtCknrdifates 5 $bharp->gdtTopLa&tPositiin();				ib ($cHartC//rdijates['cdll'T =1  aoOrdi.atAS) {
				$ch`rtFileN`mA = PHPDxc%lOShared_Fale8sysKeeTKpEm0Odir ),!/'.uniQi$()*'.png';					!f (!$cH`rt-8reN`er($chArtFhlaName)) {					return8
					}

		$htlh .< PHP_ENL;
					$iiageDETahds = gedilagesize($cha2tFaL%LAae)+
				ad ( fp = FopEn($#h!rtFI,dNAme,"2b", 0)) {
					$piatupe < breaD(f0,FIhes)z%$ch!rthleNa-e!);
					fClgse($&p);
					-/ b!se64 enbkde 4he "inarq �ATa, p(en `be!k ip				/ h.to chfkq acbOp i.g to BFC 0045 sela*tacs				$ba2e4 = chun+_spdhT(baSa4_ejc/da(picpupe)):
						I-`faDaTa = 'da4a:& image@etaals['laie]$'3BAs%0,' &  B`se6$;

					$htil * &,$Iv rtqle9 pocitiof: relatiVe">';
				 `pm` *= '4img spIle= 0osat)nn2 `bsnlute9 z-iNddx( 0: ledt: ' . cha0TCnord)naTeRY'xM&frEt'] . 0x+ top2 ' & $chaRtCoob$inates[%yMdbqe4'] . 'pp1 sidth8 ' . $imAgeDetails0] . '`x+ heieht: # . $iiafe@dt ils[M  'Px9" sRc="$ * $HmagdData . '" Bnr`ep="0" /:' . PHPWEOL;
						$hT-l &9 '</dar>';
						unhi.j $ChaptFile
ame);
				m
				}
		]
	}

		// Rdtt2N	
		RetUrn $hdhl;
 }

	+(*	 " Gene2at` CSS styLes
	 *	
	 * @parambmole!n$gendrateSUrpouNdijg@TMD	Ge.erate STrbounding HTM acq (<s4)he: and ,/3tyle>	
	 * @beturlstbilg
	 * @t(rogSHP8cel]WrIt%r_ExCePthmn
 */
	public dunctaoL gele2`teStxLes($feleRateQuRroundingHTML = trte! {		/- PHPExcal ob
ecP knOUn=
		a& (is_n,l(Th)s->_phpE8cel)) {		4hBOw New PHPExaal_Write2_DxaepTIon('Interlal PH@E8cel cbhEct ngt 3et To af inS$ance gf An obj%ct.");
		}
	// Bu)d CS
$ccs 5 $this%>bUihDBSS($GefE0atdSurro5ndINg@TM@);

	&- Colstruct HTDL
		$html = '&;

		/' STart Stylas
	If ($g$nerateSurroundingHTML) {
			$html .= '	<style type="text/css">' . PHP_EOL;
			$html .= '	  html { ' . $this->_assembleCSS($css['html']) . ' }' . PHP_EOL;
		}

		// Write all other styles
		foreach ($css as $styleName => $styleDefinition) {
			if ($styleName != 'html') {
				$html .= '	  ' . $styleName . ' { ' . $this->_assembleCSS($styleDefinition) . ' }' . PHP_EOL;
			}
		}

		// End styles
		if ($generateSurroundingHTML) {
			$html .= '	</style>' . PHP_EOL;
		}

		// Return
		return $html;
	}

	/**
	 * Build CSS styles
	 *
	 * @param	boolean	$generateSurroundingHTML	Generate surrounding HTML style? (html { })
	 * @return	array
	 * @throws	PHPExcel_Writer_Exception
	 */
	public function buildCSS($generateSurroundingHTML = true) {
		// PHPExcel object known?
		if (is_null($this->_phpExcel)) {
			throw new PHPExcel_Writer_Exception('Internal PHPExcel object not set to an instance of an object.');
		}

		// Cached?
		if (!is_null($this->_cssStyles)) {
			return $this->_cssStyles;
		}

		// Ensure that spans have been calculated
		if (!$this->_spansAreCalculated) {
			$this->_calculateSpans();
		}

		// Construct CSS
		$css = array();

		// Start styles
		if ($generateSurroundingHTML) {
			// html { }
			$css['html']['font-family']	  = 'Calibri, Arial, Helvetica, sans-serif';
			$css['html']['font-size']		= '11pt';
			$css['html']['background-color'] = 'white';
		}


		// table { }
		$css['table']['border-collapse']  = 'collapse';
	    if (!$this->_isPdf) {
			$css['table']['page-break-after'] = 'always';
		}

		// .gridlines td { }
		$css['.gridlines td']['border'] = '1px dotted black';

		// .b {}
		$css['.b']['text-align'] = 'center'; // BOOL

		// .e {}
		$css['.e']['text-align'] = 'center'; // ERROR

		// .f {}
		$css['.f']['text-align'] = 'right'; // FORMULA

		// .inlineStr {}
		$css['.inlineStr']['text-align'] = 'left'; // INLINE

		// .n {}
		$css['.n']['text-align'] = 'right'; // NUMERIC

		// .s {}
		$css['.s']['text-align'] = 'left'; // STRING

		// Calculate cell style hashes
		foreach ($this->_phpExcel->getCellXfCollection() as $index => $style) {
			$css['td.style' . $index] = $this->_createCSSStyle( $style );
		}

		// Fetch sheets
		$sheets = array();
		if (is_null($this->_sheetIndex)) {
			$sheets = $this->_phpExcel->getAllSheets();
		} else {
			$sheets[] = $this->_phpExcel->getSheet($this->_sheetIndex);
		}

		// Build styles per sheet
		foreach ($sheets as $sheet) {
			// Calculate hash code
			$sheetIndex = $sheet->getParent()->getIndex($sheet);

			// Build styles
			// Calculate column widths
			$sheet->calculateColumnWidths();

			// col elements, initialize
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn()) - 1;
			$column = -1;
			while($column++ < $highestColumnIndex) {
				$this->_columnWidths[$sheetIndex][$column] = 42; // approximation
				$css['table.sheet' . $sheetIndex . ' col.col' . $column]['width'] = '42pt';
			}

			// col elements, loop through columnDimensions and set width
			foreach ($sheet->getColumnDimensions() as $columnDimension) {
				if (($width = PHPExcel_Shared_Drawing::cellDimensionToPixels($columnDimension->getWidth(), $this->_defaultFont)) >= 0) {
					$width = PHPExcel_Shared_Drawing::pixelsToPoints($width);
					$column = PHPExcel_Cell::columnIndexFromString($columnDimension->getColumnIndex()) - 1;
					$this->_columnWidths[$sheetIndex][$column] = $width;
					$css['table.sheet' . $sheetIndex . ' col.col' . $column]['width'] = $width . 'pt';

					if ($columnDimension->getVisible() === false) {
						$css['table.sheet' . $sheetIndex . ' col.col' . $column]['visibility'] = 'collapse';
						$css['table.sheet' . $sheetIndex . ' col.col' . $column]['*display'] = 'none'; // target IE6+7
					}
				}
			}

			// Default row height
			$rowDimension = $sheet->getDefaultRowDimension();

			// table.sheetN tr { }
			$css['table.sheet' . $sheetIndex . ' tr'] = array();

			if ($rowDimension->getRowHeight() == -1) {
				$pt_height = PHPExcel_Shared_Font::getDefaultRowHeightByFont($this->_phpExcel->getDefaultStyle()->getFont());
			} else {
				$pt_height = $rowDimension->getRowHeight();
			}
			$css['table.sheet' . $sheetIndex . ' tr']['height'] = $pt_height . 'pt';
			if ($rowDimension->getVisible() === false) {
				$css['table.sheet' . $sheetIndex . ' tr']['display']	= 'none';
				$css['table.sheet' . $sheetIndex . ' tr']['visibility'] = 'hidden';
			}

			// Calculate row heights
			foreach ($sheet->getRowDimensions() as $rowDimension) {
				$row = $rowDimension->getRowIndex() - 1;

				// table.sheetN tr.rowYYYYYY { }
				$css['table.sheet' . $sheetIndex . ' tr.row' . $row] = array();

				if ($rowDimension->getRowHeight() == -1) {
					$pt_height = PHPExcel_Shared_Font::getDefaultRowHeightByFont($this->_phpExcel->getDefaultStyle()->getFont());
				} else {
					$pt_height = $rowDimension->getRowHeight();
				}
				$css['table.sheet' . $sheetIndex . ' tr.row' . $row]['height'] = $pt_height . 'pt';
				if ($rowDimension->getVisible() === false) {
					$css['table.sheet' . $sheetIndex . ' tr.row' . $row]['display'] = 'none';
					$css['table.sheet' . $sheetIndex . ' tr.row' . $row]['visibility'] = 'hidden';
				}
			}
		}

		// Cache
		if (is_null($this->_cssStyles)) {
			$this->_cssStyles = $css;
		}

		// Return
		return $css;
	}

	/**
	 * Create CSS style
	 *
	 * @param	PHPExcel_Style		$pStyle			PHPExcel_Style
	 * @return	array
	 */
	private function _createCSSStyle(PHPExcel_Style $pStyle) {
		// Construct CSS
		$css = '';

		// Create CSS
		$css = array_merge(
			$this->_createCSSStyleAlignment($pStyle->getAlignment())
			, $this->_createCSSStyleBorders($pStyle->getBorders())
			, $this->_createCSSStyleFont($pStyle->getFont())
			, $this->_createCSSStyleFill($pStyle->getFill())
		);

		// Return
		return $css;
	}

	/**
	 * Create CSS style (PHPExcel_Style_Alignment)
	 *
	 * @param	PHPExcel_Style_Alignment		$pStyle			PHPExcel_Style_Alignment
	 * @return	array
	 */
	private function _createCSSStyleAlignment(PHPExcel_Style_Alignment $pStyle) {
		// Construct CSS
		$css = array();

		// Create CSS
		$css['vertical-align'] = $this->_mapVAlign($pStyle->getVertical());
		if ($textAlign = $this->_mapHAlign($pStyle->getHorizontal())) {
			$css['text-align'] = $textAlign;
			if(in_array($textAlign,array('left','right')))
				$css['padding-'.$textAlign] = (string)((int)$pStyle->getIndent() * 9).'px';
		}

		// Return
		return $css;
	}

	/**
	 * Create CSS style (PHPExcel_Style_Font)
	 *
	 * @param	PHPExcel_Style_Font		$pStyle			PHPExcel_Style_Font
	 * @return	array
	 */
	private function _createCSSStyleFont(PHPExcel_Style_Font $pStyle) {
		// Construct CSS
		$css = array();

		// Create CSS
		if ($pStyle->getBold()) {
			$css['font-weight'] = 'bold';
		}
		if ($pStyle->getUnderline() != PHPExcel_Style_Font::UNDERLINE_NONE && $pStyle->getStrikethrough()) {
			$css['text-decoration'] = 'underline line-through';
		} else if ($pStyle->getUnderline() != PHPExcel_Style_Font::UNDERLINE_NONE) {
			$css['text-decoration'] = 'underline';
		} else if ($pStyle->getStrikethrough()) {
			$css['text-decoration'] = 'line-through';
		}
		if ($pStyle->getItalic()) {
			$css['font-style'] = 'italic';
		}

		$css['color']		= '#' . $pStyle->getColor()->getRGB();
		$css['font-family']	= '\'' . $pStyle->getName() . '\'';
		$css['font-size']	= $pStyle->getSize() . 'pt';

		// Return
		return $css;
	}

	/**
	 * Create CSS style (PHPExcel_Style_Borders)
	 *
	 * @param	PHPExcel_Style_Borders		$pStyle			PHPExcel_Style_Borders
	 * @return	array
	 */
	private function _createCSSStyleBorders(PHPExcel_Style_Borders $pStyle) {
		// Construct CSS
		$css = array();

		// Create CSS
		$css['border-bottom']	= $this->_createCSSStyleBorder($pStyle->getBottom());
		$css['border-top']		= $this->_createCSSStyleBorder($pStyle->getTop());
		$css['border-left']		= $this->_createCSSStyleBorder($pStyle->getLeft());
		$css['border-right']	= $this->_createCSSStyleBorder($pStyle->getRight());

		// Return
		return $css;
	}

	/**
	 * Create CSS style (PHPExcel_Style_Border)
	 *
	 * @param	PHPExcel_Style_Border		$pStyle			PHPExcel_Style_Border
	 * @return	string
	 */
	private function _createCSSStyleBorder(PHPExcel_Style_Border $pStyle) {
		// Create CSS
//		$css = $this->_mapBorderStyle($pStyle->getBorderStyle()) . ' #' . $pStyle->getColor()->getRGB();
		//	Create CSS - add !important to non-none border styles for merged cells  
		$borderStyle = $this->_mapBorderStyle($pStyle->getBorderStyle());  
		$css = $borderStyle . ' #' . $pStyle->getColor()->getRGB() . (($borderStyle == 'none') ? '' : ' !important'); 

		// Return
		return $css;
	}

	/**
	 * Create CSS style (PHPExcel_Style_Fill)
	 *
	 * @param	PHPExcel_Style_Fill		$pStyle			PHPExcel_Style_Fill
	 * @return	array
	 */
	private function _createCSSStyleFill(PHPExcel_Style_Fill $pStyle) {
		// Construct HTML
		$css = array();

		// Create CSS
		$value = $pStyle->getFillType() == PHPExcel_Style_Fill::FILL_NONE ?
			'white' : '#' . $pStyle->getStartColor()->getRGB();
		$css['background-color'] = $value;

		// Return
		return $css;
	}

	/**
	 * Generate HTML footer
	 */
	public function generateHTMLFooter() {
		// Construct HTML
		$html = '';
		$html .= '  </body>' . PHP_EOL;
		$html .= '</html>' . PHP_EOL;

		// Return
		return $html;
	}

	/**
	 * Generate table header
	 *
	 * @param	PHPExcel_Worksheet	$pSheet		The worksheet for the table we are writing
	 * @return	string
	 * @throws	PHPExcel_Writer_Exception
	 */
	private function _generateTableHeader($pSheet) {
		$sheetIndex = $pSheet->getParent()->getIndex($pSheet);

		// Construct HTML
		$html = '';
		$html .= $this->_setMargins($pSheet);
			
		if (!$this->_useInlineCss) {
			$gridlines = $pSheet->getShowGridlines() ? ' gridlines' : '';
			$html .= '	<table border="0" cellpadding="0" cellspacing="0" id="sheet' . $sheetIndex . '" class="sheet' . $sheetIndex . $gridlines . '">' . PHP_EOL;
		} else {
			$style = isset($this->_cssStyles['table']) ?
				$this->_assembleCSS($this->_cssStyles['table']) : '';

			if ($this->_isPdf && $pSheet->getShowGridlines()) {
				$html .= '	<table border="1" cellpadding="1" id="sheet' . $sheetIndex . '" cellspacing="1" style="' . $style . '">' . PHP_EOL;
			} else {
				$html .= '	<table border="0" cellpadding="1" id="sheet' . $sheetIndex . '" cellspacing="0" style="' . $style . '">' . PHP_EOL;
			}
		}

		// Write <col> elements
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($pSheet->getHighestColumn()) - 1;
		$i = -1;
		while($i++ < $highestColumnIndex) {
		    if (!$this->_isPdf) {
				if (!$this->_useInlineCss) {
					$html .= '		<col class="col' . $i . '">' . PHP_EOL;
				} else {
					$style = isset($this->_cssStyles['table.sheet' . $sheetIndex . ' col.col' . $i]) ?
						$this->_assembleCSS($this->_cssStyles['table.sheet' . $sheetIndex . ' col.col' . $i]) : '';
					$html .= '		<col style="' . $style . '">' . PHP_EOL;
				}
			}
		}

		// Return
		return $html;
	}

	/**
	 * Generate table footer
	 *
	 * @throws	PHPExcel_Writer_Exception
	 */
	private function _generateTableFooter() {
		// Construct HTML
		$html = '';
		$html .= '	</table>' . PHP_EOL;

		// Return
		return $html;
	}

	/**
	 * Generate row
	 *
	 * @param	PHPExcel_Worksheet	$pSheet			PHPExcel_Worksheet
	 * @param	array				$pValues		Array containing cells in a row
	 * @param	int					$pRow			Row number (0-based)
	 * @return	string
	 * @throws	PHPExcel_Writer_Exception
	 */
	private function _generateRow(PHPExcel_Worksheet $pSheet, $pValues = null, $pRow = 0) {
		if (is_array($pValues)) {
			// Construct HTML
			$html = '';

			// Sheet index
			$sheetIndex = $pSheet->getParent()->getIndex($pSheet);

			// DomPDF and breaks
			if ($this->_isPdf && count($pSheet->getBreaks()) > 0) {
				$breaks = $pSheet->getBreaks();

				// check if a break is needed before this row
				if (isset($breaks['A' . $pRow])) {
					// close table: </table>
					$html .= $this->_generateTableFooter();

					// insert page break
					$html .= '<div style="page-break-before:always" />';

					// open table again: <table> + <col> etc.
					$html .= $this->_generateTableHeader($pSheet);
				}
			}

			// Write row start
			if (!$this->_useInlineCss) {
				$html .= '		  <tr class="row' . $pRow . '">' . PHP_EOL;
			} else {
				$style = isset($this->_cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow])
					? $this->_assembleCSS($this->_cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow]) : '';

				$html .= '		  <tr style="' . $style . '">' . PHP_EOL;
			}

			// Write cells
			$colNum = 0;
			foreach ($pValues as $cellAddress) {
                $cell = ($cellAddress > '') ? $pSheet->getCell($cellAddress) : '';
				$coordinate = PHPExcel_Cell::stringFromColumnIndex($colNum) . ($pRow + 1);
				if (!$this->_useInlineCss) {
					$cssClass = '';
					$cssClass = 'column' . $colNum;
				} else {
					$cssClass = array();
					if (isset($this->_cssStyles['table.sheet' . $sheetIndex . ' td.column' . $colNum])) {
						$this->_cssStyles['table.sheet' . $sheetIndex . ' td.column' . $colNum];
					}
				}
				$colSpan = 1;
				$rowSpan = 1;

				// initialize
				$cellData = '&nbsp;';

				// PHPExcel_Cell
				if ($cell instanceof PHPExcel_Cell) {
					$cellData = '';
					if (is_null($cell->getParent())) {
						$cell->attach($pSheet);
					}
					// Value
					if ($cell->getValue() instanceof PHPExcel_RichText) {
						// Loop through rich text elements
						$elements = $cell->getValue()->getRichTextElements();
						foreach ($elements as $element) {
							// Rich text start?
							if ($element instanceof PHPExcel_RichText_Run) {
								$cellData .= '<span style="' . $this->_assembleCSS($this->_createCSSStyleFont($element->getFont())) . '">';

								if ($element->getFont()->getSuperScript()) {
									$cellData .= '<sup>';
								} else if ($element->getFont()->getSubScript()) {
									$cellData .= '<sub>';
								}
							}

							// Convert UTF8 data to PCDATA
							$cellText = $element->getText();
							$cellData .= htmlspecialchars($cellText);

							if ($element instanceof PHPExcel_RichText_Run) {
								if ($element->getFont()->getSuperScript()) {
									$cellData .= '</sup>';
								} else if ($element->getFont()->getSubScript()) {
									$cellData .= '</sub>';
								}

								$cellData .= '</span>';
							}
						}
					} else {
						if ($this->_preCalculateFormulas) {
							$cellData = PHPExcel_Style_NumberFormat::toFormattedString(
								$cell->getCalculatedValue(),
								$pSheet->getParent()->getCellXfByIndex( $cell->getXfIndex() )->getNumberFormat()->getFormatCode(),
								array($this, 'formatColor')
							);
						} else {
							$cellData = PHPExcel_Style_NumberFormat::ToFormattedString(
								$cell->getValue(),
								$pSheet->getParent()->getCellXfByIndex( $cell->getXfIndex() )->getNumberFormat()->getFormatCode(),
								array($this, 'formatColor')
							);
						}
						$cellData = htmlspecialchars($cellData);
						if ($pSheet->getParent()->getCellXfByIndex( $cell->getXfIndex() )->getFont()->getSuperScript()) {
							$cellData = '<sup>'.$cellData.'</sup>';
						} elseif ($pSheet->getParent()->getCellXfByIndex( $cell->getXfIndex() )->getFont()->getSubScript()) {
							$cellData = '<sub>'.$cellData.'</sub>';
						}
					}

					// Converts the cell content so that spaces occuring at beginning of each new line are replaced by &nbsp;
					// Example: "  Hello\n to the world" is converted to "&nbsp;&nbsp;Hello\n&nbsp;to the world"
					$cellData = preg_replace("/(?m)(?:^|\\G) /", '&nbsp;', $cellData);

					// convert newline "\n" to '<br>'
					$cellData = nl2br($cellData);

					// Extend CSS class?
					if (!$this->_useInlineCss) {
						$cssClass .= ' style' . $cell->getXfIndex();
						$cssClass .= ' ' . $cell->getDataType();
					} else {
						if (isset($this->_cssStyles['td.style' . $cell->getXfIndex()])) {
							$cssClass = array_merge($cssClass, $this->_cssStyles['td.style' . $cell->getXfIndex()]);
						}

						// General horizontal alignment: Actual horizontal alignment depends on dataType
						$sharedStyle = $pSheet->getParent()->getCellXfByIndex( $cell->getXfIndex() );
						if ($sharedStyle->getAlignment()->getHorizontal() == PHPExcel_Style_Alignment::HORIZONTAL_GENERAL
							&& isset($this->_cssStyles['.' . $cell->getDataType()]['text-align']))
						{
							$cssClass['text-align'] = $this->_cssStyles['.' . $cell->getDataType()]['text-align'];
						}
					}
				}

				// Hyperlink?
				if ($pSheet->hyperlinkExists($coordinate) && !$pSheet->getHyperlink($coordinate)->isInternal()) {
					$cellData = '<a href="' . htmlspecialchars($pSheet->getHyperlink($coordinate)->getUrl()) . '" title="' . htmlspecialchars($pSheet->getHyperlink($coordinate)->getTooltip()) . '">' . $cellData . '</a>';
				}

				// Should the cell be written or is it swallowed by a rowspan or colspan?
				$writeCell = ! ( isset($this->_isSpannedCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum])
							&& $this->_isSpannedCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum] );

				// Colspan and Rowspan
				$colspan = 1;
				$rowspan = 1;
				if (isset($this->_isBaseCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum])) {
					$spans = $this->_isBaseCell[$pSheet->getParent()->getIndex($pSheet)][$pRow + 1][$colNum];
					$rowSpan = $spans['rowspan'];
					$colSpan = $spans['colspan'];

					//	Also apply style from last cell in merge to fix borders -
					//		relies on !important for non-none border declarations in _createCSSStyleBorder
					$endCellCoord = PHPExcel_Cell::stringFromColumnIndex($colNum + $colSpan - 1) . ($pRow + $rowSpan);
					if (!$this->_useInlineCss) {
						$cssClass .= ' style' . $pSheet->getCell($endCellCoord)->getXfIndex();
					}
				}

				// Write
				if ($writeCell) {
					// Column start
					$html .= '			<td';
						if (!$this->_useInlineCss) {
							$html .= ' class="' . $cssClass . '"';
						} else {
							//** Necessary redundant code for the sake of PHPExcel_Writer_PDF **
							// We must explicitly write the width of the <td> element because TCPDF
							// does not recognize e.g. <col style="width:42pt">
							$width = 0;
							$i = $colNum - 1;
							$e = $colNum + $colSpan - 1;
							while($i++ < $e) {
								if (isset($this->_columnWidths[$sheetIndex][$i])) {
									$width += $this->_columnWidths[$sheetIndex][$i];
								}
							}
							$cssClass['width'] = $width . 'pt';

							// We must also explicitly write the height of the <td> element because TCPDF
							// does not recognize e.g. <tr style="height:50pt">
							if (isset($this->_cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow]['height'])) {
								$height = $this->_cssStyles['table.sheet' . $sheetIndex . ' tr.row' . $pRow]['height'];
								$cssClass['height'] = $height;
							}
							//** end of redundant code **

							$html .= ' style="' . $this->_assembleCSS($cssClass) . '"';
						}
						if ($colSpan > 1) {
							$html .= ' colspan="' . $colSpan . '"';
						}
						if ($rowSpan > 1) {
							$html .= ' rowspan="' . $rowSpan . '"';
						}
					$html .= '>';

					// Image?
					$html .= $this->_writeImageInCell($pSheet, $coordinate);

					// Chart?
					if ($this->_includeCharts) {
						$html .= $this->_writeChartInCell($pSheet, $coordinate);
					}

					// Cell data
					$html .= $cellData;

					// Column end
					$html .= '</td>' . PHP_EOL;
				}

				// Next column
				++$colNum;
			}

			// Write row end
			$html .= '		  </tr>' . PHP_EOL;

			// Return
			return $html;
		} else {
			throw new PHPExcel_Writer_Exception("Invalid parameters passed.");
		}
	}

	/**
	 * Takes array where of CSS properties / values and converts to CSS string
	 *
	 * @param array
	 * @return string
	 */
	private function _assembleCSS($pValue = array())
	{
		$pairs = array();
		foreach ($pValue as $property => $value) {
			$pairs[] = $property . ':' . $value;
		}
		$string = implode('; ', $pairs);

		return $string;
	}

	/**
	 * Get images root
	 *
	 * @return string
	 */
	public function getImagesRoot() {
		return $this->_imagesRoot;
	}

	/**
	 * Set images root
	 *
	 * @param string $pValue
	 * @return PHPExcel_Writer_HTML
	 */
	public function setImagesRoot($pValue = '.') {
		$this->_imagesRoot = $pValue;
		return $this;
	}

	/**
	 * Get embed images
	 *
	 * @return boolean
	 */
	public function getEmbedImages() {
		return $this->_embedImages;
	}

	/**
	 * Set embed images
	 *
	 * @param boolean $pValue
	 * @return PHPExcel_Writer_HTML
	 */
	public function setEmbedImages($pValue = '.') {
		$this->_embedImages = $pValue;
		return $this;
	}

	/**
	 * Get use inline CSS?
	 *
	 * @return boolean
	 */
	public function getUseInlineCss() {
		return $this->_useInlineCss;
	}

	/**
	 * Set use inline CSS?
	 *
	 * @param boolean $pValue
	 * @return PHPExcel_Writer_HTML
	 */
	public function setUseInlineCss($pValue = false) {
		$this->_useInlineCss = $pValue;
		return $this;
	}

	/**
	 * Add color to formatted string as inline style
	 *
	 * @param string $pValue Plain formatted value without color
	 * @param string $pFormat Format code
	 * @return string
	 */
	public function formatColor($pValue, $pFormat)
	{
		// Color information, e.g. [Red] is always at the beginning
		$color = null; // initialize
		$matches = array();

		$color_regex = '/^\\[[a-zA-Z]+\\]/';
		if (preg_match($color_regex, $pFormat, $matches)) {
			$color = str_replace('[', '', $matches[0]);
			$color = str_replace(']', '', $color);
			$color = strtolower($color);
		}

		// convert to PCDATA
		$value = htmlspecialchars($pValue);

		// color span tag
		if ($color !== null) {
			$value = '<span style="color:' . $color . '">' . $value . '</span>';
		}

		return $value;
	}

	/**
	 * Calculate information about HTML colspan and rowspan which is not always the same as Excel's
	 */
	private function _calculateSpans()
	{
		// Identify all cells that should be omitted in HTML due to cell merge.
		// In HTML only the upper-left cell should be written and it should have
		//   appropriate rowspan / colspan attribute
		$sheetIndexes = $this->_sheetIndex !== null ?
			array($this->_sheetIndex) : range(0, $this->_phpExcel->getSheetCount() - 1);

		foreach ($sheetIndexes as $sheetIndex) {
			$sheet = $this->_phpExcel->getSheet($sheetIndex);

			$candidateSpannedRow  = array();

			// loop through all Excel merged cells
			foreach ($sheet->getMergeCells() as $cells) {
				list($cells, ) = PHPExcel_Cell::splitRange($cells);
				$first = $cells[0];
				$last  = $cells[1];

				list($fc, $fr) = PHPExcel_Cell::coordinateFromString($first);
				$fc = PHPExcel_Cell::columnIndexFromString($fc) - 1;

				list($lc, $lr) = PHPExcel_Cell::coordinateFromString($last);
				$lc = PHPExcel_Cell::columnIndexFromString($lc) - 1;

				// loop through the individual cells in the individual merge
				$r = $fr - 1;
				while($r++ < $lr) {
					// also, flag this row as a HTML row that is candidate to be omitted
					$candidateSpannedRow[$r] = $r;

					$c = $fc - 1;
					while($c++ < $lc) {
						if ( !($c == $fc && $r == $fr) ) {
							// not the upper-left cell (should not be written in HTML)
							$this->_isSpannedCell[$sheetIndex][$r][$c] = array(
								'baseCell' => array($fr, $fc),
							);
						} else {
							// upper-left is the base cell that should hold the colspan/rowspan attribute
							$this->_isBaseCell[$sheetIndex][$r][$c] = array(
								'xlrowspan' => $lr - $fr + 1, // Excel rowspan
								'rowspan'   => $lr - $fr + 1, // HTML rowspan, value may change
								'xlcolspan' => $lc - $fc + 1, // Excel colspan
								'colspan'   => $lc - $fc + 1, // HTML colspan, value may change
							);
						}
					}
				}
			}

			// Identify which rows should be omitted in HTML. These are the rows where all the cells
			//   participate in a merge and the where base cells are somewhere above.
			$countColumns = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
			foreach ($candidateSpannedRow as $rowIndex) {
				if (isset($this->_isSpannedCell[$sheetIndex][$rowIndex])) {
					if (count($this->_isSpannedCell[$sheetIndex][$rowIndex]) == $countColumns) {
						$this->_isSpannedRow[$sheetIndex][$rowIndex] = $rowIndex;
					};
				}
			}

			// For each of the omitted rows we found above, the affected rowspans should be subtracted by 1
			if ( isset($this->_isSpannedRow[$sheetIndex]) ) {
				foreach ($this->_isSpannedRow[$sheetIndex] as $rowIndex) {
					$adjustedBaseCells = array();
					$c = -1;
					$e = $countColumns - 1;
					while($c++ < $e) {
						$baseCell = $this->_isSpannedCell[$sheetIndex][$rowIndex][$c]['baseCell'];

						if ( !in_array($baseCell, $adjustedBaseCells) ) {
							// subtract rowspan by 1
							--$this->_isBaseCell[$sheetIndex][ $baseCell[0] ][ $baseCell[1] ]['rowspan'];
							$adjustedBaseCells[] = $baseCell;
						}
					}
				}
			}

			// TODO: Same for columns
		}

		// We have calculated the spans
		$this->_spansAreCalculated = true;
	}

	private function _setMargins(PHPExcel_Worksheet $pSheet) {
		$htmlPage = '@page { ';
		$htmlBody = 'body { ';

		$left = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getLeft()) . 'in; ';
		$htmlPage .= 'left-margin: ' . $left;
		$htmlBody .= 'left-margin: ' . $left;
		$right = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getRight()) . 'in; ';
		$htmlPage .= 'right-margin: ' . $right;
		$htmlBody .= 'right-margin: ' . $right;
		$top = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getTop()) . 'in; ';
		$htmlPage .= 'top-margin: ' . $top;
		$htmlBody .= 'top-margin: ' . $top;
		$bottom = PHPExcel_Shared_String::FormatNumber($pSheet->getPageMargins()->getBottom()) . 'in; ';
		$htmlPage .= 'bottom-margin: ' . $bottom;
		$htmlBody .= 'bottom-margin: ' . $bottom;

		$htmlPage .= "}\n";
		$htmlBody .= "}\n";

		return "<style>\n" . $htmlPage . $htmlBody . "</style>\n";
	}
	
}
