
		<div class="card">
		  <div class="card-header center"><strong>Ranking</strong> | 
		  	<strong>Your position is: #<?php echo $rankPlayer?> of <?php echo count($allPlayers)?> Players</strong>
		  </div>
		  <div class="card-body">
		  		<table class="table table-sm center table-striped table-dark">
		  			<?php 
		  				$headers = array(
		  					'#',
		  					'Name',
		  					'Amount'
		  				);
		  			?>
		  			<thead>
		  				<?php 
		  					echo $this->Html->tableHeaders( $headers );
		  				?>
		  			</thead>
		  			<tbody>
		  				<?php 
		  					$cels = array();
		  					foreach( $ranking as $k=>$rank ){
		  						$class = '';
		  						if( $idUser == $rank['Player']['id']){
		  							$class = 'bg-success';
		  						}
		  							echo "<tr class=".$class.">";
		  							?>
		  								<td><?php echo $k+1?></td>
		  								<td><?php echo $rank['Player']['name']?></td>
		  								<td><?php echo $this->Number->currency( $rank['Player']['amount_usd'] )?></td>
		  							</tr>
		  						<?php
		  					}
		  				?>
		  			</tbody>
		  		</table>
		  </div> 
		</div>
