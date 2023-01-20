 <!-- Modal -->
 <div class="modal fade" id="modal-success" role="dialog">
     <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Berhasil!</h4>
             </div>
             <div class="modal-body">
                 <p><?= $this->session->flashdata('success'); ?></p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
             </div>
         </div>

     </div>
 </div>

 <div class="modal fade" id="modal-warning" role="dialog">
     <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Gagal!</h4>
             </div>
             <div class="modal-body">
                 <p><?= $this->session->flashdata('warning'); ?></p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
             </div>
         </div>

     </div>
 </div>
 <?php if ($this->session->flashdata('success')) : ?>
     <script>
         $(document).ready(function() {
             $('#modal-success').modal('show');
         });
     </script>
 <?php elseif ($this->session->flashdata('warning')) : ?>
     <script>
         $(document).ready(function() {
             $('#modal-warning').modal('show');
         });
     </script>
 <?php endif; ?>