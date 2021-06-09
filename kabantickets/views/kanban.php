<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
   <div class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="panel_s">
               <div class="panel-body">
                   <!-- form init -->
                    <h2>Tickets - Kanban view</h2>
                    <hr />
                    
                    
                    
                    
                    <div class="kan-ban-tab" id="kan-ban-tab" style="overflow:auto;">
                     <div class="row">
                        <div id="kanban-params">
                            <input type="hidden" name="project_id" value="">
                        </div>
                        <div class="container-fluid" style="min-width: 1800px;">
                           <div id="kan-ban">
                               
                               <?php foreach ($status as $s) { ?>
                                <ul class="kan-ban-col tasks-kanban" data-col-status-id="<?php echo $s['ticketstatusid']; ?>" data-total-pages="1">
                                    <li class="kan-ban-col-wrapper">
                                        <div class="border-right panel_s">
                                            <div class="panel-heading-bg" style="background:<?php echo $s['statuscolor']; ?>;border-color:<?php echo $s['name']; ?>;color:#fff; ?>" data-status-id="1">
                                                <div class="kan-ban-step-indicator"></div>
                                                <span class="heading"><?php echo $s['name']; ?></span>
                                                <a href="#" onclick="return false;" class="pull-right color-white"> </a>
                                            </div>
                                            <div class="kan-ban-content-wrapper" style="max-height: 456px;">
                                                <div class="kan-ban-content" style="min-height: 456px;">
                                                    <ul class="status tasks-status relative " data-task-status-id="1">
                                                        
                                                        <?php 
                                                        foreach ($tickets as $t) {
                                                        if ($t['status'] == $s['ticketstatusid']){
                                                        ?>
                                                        <li data-task-id="<?php echo $t['ticketid'];?>" class="task current-user-task">
                                                            <div class="panel-body" style="border-top: 2px solid #03a9f4;">
                                                                <div class="row">
                                                                    <div class="col-md-12 task-name">
                                                                        <a href="/admin/tickets/ticket/<?php echo $t['ticketid'];?>">
                                                                            <span class="inline-block full-width mtop10"><?php echo $t['subject'];?></span>
                                                                        </a>
                                                                        <a class="text-muted" data-toggle="tooltip" title="Relacionado ao" href="/admin/clients/client/<?php echo $t['client_id'];?>"><?php echo $t['client'];?></a>
                                                                    </div>
                                                                    <div class="col-md-6 text-muted mtop10">
                                                                        <a href="https://projetos.drbmarketing.com.br/admin/profile/<?php echo $t['assigned_id'];?>"><img data-toggle="tooltip" data-title="<?php echo $t['assigned'];?>" src="https://projetos.drbmarketing.com.br/uploads/staff_profile_images/<?php echo $t['assigned_id'];?>/small_<?php echo $t['profile_image'];?>" class="staff-profile-image-xs mright5"></a>
                                                                        <span class="hide"><?php echo $t['assigned'];?></span>
                                                                    </div>
                                                                    <div class="col-md-6 text-right text-muted mtop10">
                                                                        <?php if ($t['priority'] >= 3) { ?>
                                                                        <span class="mright5 inline-block text-muted" data-toggle="tooltip" data-title="High priority"><i class="fa fa-exclamation-triangle "></i></span>
                                                                        <?php } ?>
                                                                        <?php
                                                                        $days = floor((time() - strtotime($t['date']))/3600/24);
                                                                        ?>
                                                                        <span class="inline-block text-muted" data-toggle="tooltip" data-title="<?php echo date('d/m/Y', strtotime($t['date']));?>"><i class="fa fa-calendar"></i> +<?php echo $days; ?>d</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php 
                                                        } # end if
                                                        } # end foreach tickets ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <?php } #end foreach status ?>
                            </div>
                        </div>
                     </div>
                  </div>
                    
                    
                    
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php init_tail(); ?>
</body>
</html>