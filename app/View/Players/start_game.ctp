<div class="container"><br/>
	<h2 class="center color-blanco">
		Trade the best you can compete with other people
	</h2><br/>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<!--<div class="card-header">
				<h3>Sign In</h3>
			</div>-->
			<div class="card-body">
				<form>
					<?php 
						echo $this->Form->create('Player', 
							array(
								'url' => array(
										'controller' => 'players', 
										'action' => 'playing'
								),
							)
	  					);
					?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<?php 
							echo $this->Form->input('name',array(
								'label' => false,
								'class' => 'form-control',
								'placeholder' => 'Name of player'
							));
						?>
					</div>
					<div class="form-group">
						<?php 
							$options = array('label' => 'Start', 'class' => 'btn btn-success btn-block', 'div' => false);
							echo $this->Form->end($options);
						?>
					</div>
					<?php ?>
				</form>
			</div>
			</div>
		</div>
	</div>
