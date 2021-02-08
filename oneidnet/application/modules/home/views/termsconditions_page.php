<?php
$this->load->module('templates');
$this->templates->content_header();
//$this->session->userdata('user_id');
?>
              <div class="middle_content">
		<!-- Start Left -->
                <div class="main_content_left">

                    <div class="left_links">

                      <ul>
                            <li class="about_img"><a href="<?php echo base_url().'home/aboutus'?>" ></a></li>
                            <li class="policies_img"><a href="<?php echo base_url().'home/policies'?>" ></a></li>
                            <li class="foundation_img"><a href="<?php echo base_url().'home/foundation'?>"></a></li>
                            <li class="privacy_img"><a href="<?php echo base_url().'home/privacy'?>"></a></li>
                            <li class="tc_img_active"><a href="<?php echo base_url().'home/termsconditions'?>"></a></li>
                            <?php if($type == 'module' && $type != 'representative' && $type != 'add'){?>
                    <li class="cs_img_active"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <?php }else{?>
                    <li class="cs_img"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <?php } ?>
                <li class="cu_img"><a href="<?php echo base_url() . 'home/contactus' ?>"></a></li>
                <li class="all_img"><a href="<?php echo base_url() . 'home/allinone' ?>"></a></li>
                      <?php 
                    $obj = $this->load->module('cookies');
                    $db_api = $this->load->module('db_api');
                    $sup_query = "SELECT * FROM iws_profiles iws INNER JOIN oneid_support os ON os.one_email = iws.email WHERE profile_id='".$obj->getUserID()."'";
                    $emp_rest = $db_api->custom($sup_query);
                    if($emp_rest){?>
                        <li class="sacc_img"><a href="<?php echo base_url() . 'home/emp_support_access'?>"></a></li>
                    <?php } ?>
                <?php 
                    if($add_repre_support != "" || $repre != ""){
                        if($type != 'module' && $type != 'representative' && $type == 'add'){?>
                        <li class="asupp_img_active"><a href="<?php echo base_url() . 'home/createsupport_emp' ?>"></a></li>
                <?php }else{?>
                        <li class="asupp_img"><a href="<?php echo base_url() . 'home/createsupport_emp' ?>"></a></li>
                    <?php }
                    } ?>
                    <?php
                    if($add_repre_support != "" || $repre != "" ){
                        if($type != 'module' && $type != 'add' && $type == 'representative'){?>
                            <li class="arepre_img_active"><a href="<?php echo base_url() . 'home/add_representative' ?>"></a></li>
                    <?php }else{?>
                            <li class="arepre_img"><a href="<?php echo base_url() . 'home/add_representative' ?>"></a></li>
                    <?php }
                    } ?>
                        </ul>

                    </div>

                </div>
                <!-- End Left -->


                <!-- Start Right -->
                <div class="main_content_right">

                    <div class="heading_content">TERMS AND CONDITIONS</div>

                    <div class="main_content_right_scroll">

                    <div class="main_content">
This Agreement shall terminate upon the expiration or other termination of the final existing Service Contract(s) entered into under this Service Agreement. The term of a Service Contract shall commence on the Service Commencement Date and shall terminate at the end of the stated Service Term of such Service Agreement.
                        </div>


                          <div class="main_content">
Unless otherwise stated in these terms and conditions, if a Service Contract does not specify a term of service, the Service Term shall be five (5) years from the Service Commencement Date with option to renew. Invoice and submit a written claim, including all documentation substantiating user’s or organization’s claim, to ONEIDNET for the disputed amount of the invoice by the invoice due date.
                        </div>




                       <div class="main_content">
The Parties shall negotiate in good faith to resolve the dispute. However, should the parties fail to mutually resolve the dispute within thirty (30) calendar days after the dispute was submitted to ONEIDNET, all disputed amounts shall become immediately due and payable to ONEIDNET. Under no circumstances may the user and/or organization submit a billing dispute to ONEIDNET later than thirty (30) days following user’s or organization’sreceipt of the applicable invoice.
                        </div>

                        <div class="sub_heading_content">SERVICE AGREEMENT EXPIRATION OR TERMINATION:</div>

                <div class="main_content">
Upon the expiration or termination of a Service Contract for any reason: (i) ONEIDNET may discontinue the applicable Service; (ii) ONEIDNETmay delete all applicable data, files, electronic messages, voicemail or other information stored on ONEIDNET’s servers or systems; and (iii) if user or organization has terminated the Service Contract prior to the expiration of the Service Term for convenience, or if ONEIDNEThas terminated the Service Contract prior to the expiration of the Service Term as a result of material breach by the user or organization, ONEIDNET will assess and collect from user and/or organization applicable Termination Charges.
                        </div>

       <div class="sub_heading_content">LEGAL CHANGES:</div>



                <div class="main_content">
The Useracknowledge that the respective rights and obligations of each party as set forth in this Service Agreement upon its execution are based on law and the regulatory environment as it exists on the date of execution of this Service Agreement. ONEIDNET may, in its sole discretion, immediately terminate this Agreement, in whole or in part, in the event there is a material change in any law, rule, regulation, Force Majeure event, or judgment of any court or government agency, and that change affects ONEIDNET’s ability to provide the Services herein.
                        </div>

               <div class="sub_heading_content">LIMITATION OF LIABILITY; DISCLAIMER OF WARRANTIES; WARNINGS</div>

               <div class="main_content">
Neither party will be liable to the other for any incidental, indirect, special, punitive or consequential damages, whether or not foreseeable, of any kind including but not limited to any loss revenue, loss of use, loss of business or loss of profit, whether such alleged liability arises in contract ortort, provided, however, that nothing herein is intended to limit the user’s or organization’s liability for amounts owed for the services provided by ONEIDNET or for early termination charges.
                        </div>


               <div class="main_content">
There are no warranties, express or implied, including without limitation any implied warranty of merchantability, fitness for a particular purpose, title and non-infringement with respect to the ONEIDNET Internet System Module Services. All such warranties are hereby expressly disclaimed to the maximum extent allowed by law. Without limiting the generality of the foregoing, ONEIDNET does not warrant that the ONEIDNET Internet System Module Services will be uninterrupted, error-free, or free of latency or delay, or that the ONEIDNET Internet System Module Services will meet the user’s or the organization’srequirements, or that the ONEIDNET Internet System Module Services will prevent unauthorized access by third parties.
                        </div>

          <div class="main_content">
ONEIDNET makes no warranties or representations with respect to the ONEIDNET Internet System Module Services for use by third parties.In no event shall ONEIDNET, or its associated parties, suppliers,licensors, or representatives be liable for any loss, damage orclaim arising out of or related to: (i) stored,transmitted, or recorded data, files, or software; (ii) any act or omission of user and/or organization, his/her representatives or third parties; (iii) interoperability, interaction or interconnection of the services with applications, devices, services or networks provided by the user or organization or thirdparties; or (iv) loss or destruction of anycustomer hardware, software, files or dataresulting from any virus or other harmful feature or from any attempt to remove it from devices.
                        </div>
                <div class="sub_heading_content">INDEMNIFICATION:</div>

          <div class="main_content">
The User as a Party, each Party (“Indemnifying Party”) will indemnify and hold harmless the other Party (“Indemnified Party”), its affiliates, officers, directors, employees, stockholders, partners, providers, independent contractors, representatives and agents from and against any and all joint or several costs, damages, losses, liabilities, expenses, judgments, fines, settlements and any other amount of any nature, including reasonable fees and disbursements of attorneys, accountants, and experts, arising from any and all claims, demands, actions, suits, or proceedings whether civil, criminal, administrative, or investigative (collectively, "Claims") relating to: (i) any Claim of any third party resulting from the negligence or willful act or omission of Indemnifying Party arising out of or related to the Service Agreement, the obligations hereunder, and uses of ONEIDNET Internet System Module Services; and (ii) any Claim of any third party alleging infringement of a patent orcopyright arising out of or related to this Service Agreement, the obligations hereunder, and the use of ONEIDNET Internet System Module Services.
                        </div>

                <div class="main_content">
The Indemnifying Party agrees to defend the Indemnified Party for any loss, injury, liability, claim or demand (“Actions”) that is the subject of the Services Agreement hereof. The Indemnified Party agrees to notify the Indemnifying Partypromptly, in writing, of any Actions, threatened or actual, and to cooperate in every reasonable way to facilitate the defense or settlement of such Actions.
                        </div>
                 <div class="main_content">
The Indemnifying Party shall assume the defense of any Action with counsel of its own choosing, but which is reasonably satisfactory to the Indemnified Party. The Indemnified Party may employ its own counsel in any such case, and shall pay such counsel’s fees and expenses. The Indemnifying Party shall have the right to settle any claim for which indemnification is available; provided, however, that to the extent that such settlement requires the Indemnified Party to take or refrain from taking any action or purports to obligate the Indemnified Party, then the Indemnifying Party shall not settle such claim without the prior written consent of the Indemnified Party, which consent shall not be unreasonably withheld, conditioned or delayed regardless of jurisdiction and the user and/or organization agree that no court of law whether local, national or international (Regardless of geographic location) may prevent the effects of this Service Contract.
                        </div>


                        <div class="sub_heading_content">BINDING ARBITRATION:</div>



              <div class="main_content">
If user or organization has a Dispute (as defined below) with ONEIDNET that cannot be resolved through an informal dispute resolution process between the parties, the user or organization or ONEIDNET may elect to arbitrate that Dispute in accordance with the terms of this arbitration provision (“Arbitration Provision”) rather than litigate the Dispute in court. Arbitration means the parties will have a fair hearing before a neutral arbitrator instead of in a court by a judge or jury as selected by ONEIDNET. Proceeding in arbitration may result in limited discovery and may be subject to limited review by courts.
                        </div>

           <div class="sub_heading_content">SEVERABILITY:</div>
          <div class="main_content">
(a) If any clause within this Arbitration Provision is found to be illegal or unenforceable, that clause will be severed from this Arbitration Provision, and the remainder of this Arbitration Provision will be given full force and effect. If the class action waiver clause is found to be illegal or unenforceable, the entireArbitration Provision will be unenforceable, and the dispute will be decided by a court.
                        </div>

         <div class="main_content">
(b) In the event this entire Arbitration Provision is determined to be illegal or unenforceable for any reason, or if aclaim is brought in a Dispute that is found by a court to beexcluded from the scope of this Arbitration Provision, user and organizationand ONEIDNET have each agreed to waive, to the fullest extent allowed by law, any trial by jury.
                        </div>
                        <div class="sub_heading_content">EXCLUSIONS FROM ARBITRATION:</div>

                       <div class="main_content">
The user and/or organization and ONEIDNETagree that the following will not be subject to arbitration: (1) any claim filed by the user and/or organization or by ONEIDNET that is not aggregated with the claim of any other userand whose amount in controversy is properly within the jurisdiction of a court that is limited to adjudicating small claims; (2) any dispute over the validity of any party’s intellectual property rights; (3) any dispute related to or arising from allegations associated with unauthorized use or receipt of service; (4) any dispute that arises between ONEIDNET and any local or regional authority or agency that is empowered by that country’s law; and (5) any dispute that can only be brought before the local authority under the terms of that country.
                        </div>

                          <div class="main_content">
This Arbitration Provision shall survive the termination of user’s and/or organization Service Agreement with ONEIDNET and the provisioning of Service(s) thereunder.                        </div>

                <div class="sub_heading_content">INTELLECTUAL PROPERTY RIGHTS:</div>

                 <div class="main_content">
Title and intellectual property rights to the Internet System Modules and Services are owned by ONEIDNETor otherwise by the owners of such material. The copying, redistribution, reselling, bundling or publication of the Services, in whole or in part, without express prior written consent from ONEIDNET or other owner of such material, is prohibited.                        </div>


             <div class="sub_heading_content">PROHIBITED USES:</div>

 <div class="main_content">
Except as otherwise provided in the General Terms and Conditions, the user and/or organizationmay not sell, resell, sublease, assign, license, sublicense, share, provide, or otherwise utilize in conjunction with a third party (including, without limitation, in any joint venture or as part of any outsourcing activity) the ONEIDNET Internet System Modules Services or any component thereof.                        </div>

             <div class="sub_heading_content">VIOLATION:</div>

<div class="main_content">
Any breach of this Service Agreement shall be deemed a material breach of thecomplete Service Agreement. In the event of such material breach, ONEIDNET shall have the right to restrict, suspend, or terminate immediately any or all Service Contracts, without liability on the part of ONEIDNET, and then to notify the user and/or organization of the action that ONEIDNET has taken and the reason for such action, in addition to any and all other rights and remedies under this Service Agreement to collect any due amounts from the user and/or the organization.                        </div>


<div class="sub_heading_content">MISCELLANEOUS TERMS:</div>

<div class="sub_heading_content">FORCE MAJEURE:</div>

<div class="main_content">
Neither party shall be liable to the other party for any delay, failure in performance, loss, or damage to the extent caused by force majeure conditions such as acts of God, fire, explosion, power blackout, satellite connection cuts, cable cuts, acts of regulatory or governmental agencies, unavailability of right-ofway, unavailability of services or materials and systems upon which the Services rely, or other causes beyond the party’s reasonable control, except that user’sand/or organization’s obligation to pay for Services provided shall not be excused. Changes in economic, business or competitive condition shall not be considered force majeure events.                       </div>

<div class="sub_heading_content">ASSIGNMENT AND TRANSFER:</div>
             <div class="main_content">
Neither Party shall assign any right, obligation or duty, in whole or in part, nor of any other interest hereunder, without the prior written consent of the other Party, which shall not be unreasonably withheld.  All obligations and duties of either Party under this Agreement shall be binding on all successors in interest and assigns of such Party.              </div>


       <div class="sub_heading_content">ENTIRE UNDERSTANDING:</div>

        <div class="main_content">
The Service Agreement together with the Service Contract(s) constitutes the entire understanding of the parties related to the subject matter hereof. The Agreement supersedes all prior agreements, proposals, representations, statements, or understandings, whether written or oral, concerning the Services or the parties’ rights or obligations relating to the Services             </div>

       <div class="main_content">
Any prior representations, promises, inducements, or statements of intent regarding the Services that are not expressly provided for in this Service Agreement are of no effect. Terms or conditions contained in any purchase order, or restrictive endorsements or other statements on any form of payment, shall be void and of no force or effect. Only specifically authorized representatives of ONEIDNET, which must be at minimum an executive level position, may make modifications to this Service Agreement or this ServiceAgreement’s form. No modification to the form or this Service Agreement made by a representative of ONEIDNET who has not been specifically authorized to make such modifications shall be binding upon ONEIDNET. No subsequent agreement among the parties concerning the Services shall be effective or binding unless it is executed in writing by authorized representatives of both parties.       </div>


<div class="sub_heading_content">SURVIVAL:</div>

       <div class="main_content">
The rights and obligations of either party that by their nature would continue beyond the expiration or termination of this Service Agreement and any Service Contract, including without limitation representations and warranties, indemnifications, and limitations of liability, shall survive termination or expiration of this Service Agreement and/or any Service Contract.       </div>



<div class="sub_heading_content">CHOICE OF LAW:</div>
         <div class="main_content">
The laws of the geographic location in which the Services are provided shall govern the construction, interpretation, and performance of this Service Agreement, except to the extent superseded by evaluation of ONEIDNET that the legal system of any country is not fit to govern the construction, interpretation, and performance of this Service Agreement. The user and/o the organization agree that countries in which their respective legal system does not function and is not executable or may take excessively long to process are deemed to be not fit jurisdictions. Not fit jurisdictions are the sole designation at ONEIDNET’s discretion and the user agrees that ONEIDNET in all cases shall designate the pertinent jurisdiction and court of law to be used.       </div>



<div class="sub_heading_content">NO THIRD PARTY BENEFICIARIES:</div>
 <div class="main_content">
This Agreement does not expressly or implicitly provide any third party (including users) with any remedy, claim, liability, reimbursement, cause of action, or other right or privilege.    </div>


                <div class="sub_heading_content">NO WAIVER:</div>

                 <div class="main_content">
No failure by either party to enforce anyrights hereunder shall constitute a waiver of such right(s).    </div>


                <div class="sub_heading_content">INDEPENDENT CONTRACTORS:</div>
                <div class="main_content">
The Parties to the Service Agreement are independent contractors. Neither Party is an agent, representative, or partner of the other Party. Neither Party shall have any right, power, or authority to enter into any agreement for, or on behalf of, or incur any obligation or liability of, or to otherwise bind, the other Party. This Agreement shall not be interpreted or construed to create an association, agency, joint venture, or partnership between the Parties or to impose any liability attributable to such a relationship upon either Party. </div>

                <div class="sub_heading_content">ARTICLE HEADINGS:</div>

                <div class="main_content">
The article headings used herein are for reference only and shall not limit or control any term or provision of this Service Agreement or the interpretation or construction thereof. </div>
                <div class="sub_heading_content">COMPLIANCE WITH LAWS:</div>
                <div class="main_content">
Each of the Parties agrees to comply with all applicable and designated laws and regulations and ordinances inthe performance of its respective obligations under this Service Agreement.</div>


<div class="sub_heading_content">SPECIFIC CONTRACT TERMS:</div>
 <div class="main_content">
Service Contract(s) are specified with the terms and conditions of specific services under the ONEIDNET Internet System Modules Services, which include the stipulations for that Module’s specific Services to be contracted between the Parties. Separate Service Contract(s) shall be executed between the Parties’ authorized signatories and the agreements shall be generated by the ONEIDNET One Network authorized personnel.</div>


                <div style="float: right">
                     <a href="#top">  <img src="images/backtotop.png"  width="20" height="20" title="top"> </a>
                 </div>

                </div>


                </div>
                <!-- End Right -->
              </div>


            </div>






</body>

</html>